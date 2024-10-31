<?php

defined( 'ABSPATH' ) or die();

class No_Browser_Nag_Test extends WP_UnitTestCase {

	protected $key = '';

	public static function setUpBeforeClass() {
		// Make all requests as if in the admin, which is the only place the plugin
		// affects.
		define( 'WP_ADMIN', true );

		// Require the file containing the function that determines if the browser is
		// out of date.
		require_once( ABSPATH . '/wp-admin/includes/dashboard.php' );

		// Fire admin_init action, which is what the plugin keys off of to begin.
//		do_action( 'admin_init' );
	}

	public function setUp() {
		parent::setUp();

		$this->key = $this->set_user_agent_and_get_key();

		// Fire admin_init action, which is what the plugin keys off of to begin.
//		do_action( 'admin_init' );
	}


	//
	//
	// DATA PROVIDERS
	//
	//


	//
	//
	// HELPER FUNCTIONS
	//
	//


	private function set_user_agent_and_get_key( $user_agent = '' ) {
		if ( ! $user_agent ) {
			$user_agent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/537.13+ (KHTML, like Gecko) Version/5.1.7 Safari/534.57.2';
		}

		$_SERVER['HTTP_USER_AGENT'] = $user_agent;

		return md5( $_SERVER['HTTP_USER_AGENT'] );
	}

	public function get_outdated_safari_data() {
		return array(
			'name'            => 'Safari',
			'version'         => '5.1.7',
			'platform'        => 'Macintosh',
			'update_url'      => 'https://www.apple.com/safari/',
			'img_src'         => 'http://s.w.org/images/browsers/safari.png?1',
			'img_src_ssl'     => 'https://s.w.org/images/browsers/safari.png?1',
			'current_version' => '11',
			'upgrade'         => true,
			'insecure'        => true,
			'mobile'          => false,
		);
	}


	//
	//
	// TESTS
	//
	//


	public function test_function_exists() {
		$this->assertTrue( function_exists( 'c2c_no_browser_nag' ) );
	}

	public function test_hooks_admin_init() {
		$this->assertEquals( 10, has_filter( 'admin_init', 'c2c_no_browser_nag' ) );
	}

	public function test_no_errors_if_no_HTTP_USER_AGENT_set() {
		unset( $_SERVER['HTTP_USER_AGENT'] );
		$this->key = '';

		$this->assertEmpty( wp_check_browser_version() );
	}

	// Sanity test for cached browser status.
	public function test_returns_cached_outdated_browser_data() {
		add_filter( 'pre_site_transient_browser_' . $this->key, array( $this, 'get_outdated_safari_data' ) );

		$expected = $this->get_outdated_safari_data();

		$this->assertEquals( $expected, wp_check_browser_version() );
	}

	public function test_hooks_pre_site_transient_browser() {
		// Simulate plugin being triggered via 'admin_init'.
		c2c_no_browser_nag();

		$this->assertEquals( 100, has_filter( 'pre_site_transient_browser_' . $this->key ) );
	}

	public function test_no_browser_nag() {
		// Simulate plugin being triggered via 'admin_init'.
		c2c_no_browser_nag();

		$this->assertEmpty( wp_check_browser_version() );
	}

	public function test_no_browser_nag_with_cached_outdated_browser_data() {
		add_filter( 'pre_site_transient_browser_' . $this->key, array( $this, 'get_outdated_safari_data' ), 11 );

		// Simulate plugin being triggered via 'admin_init'.
		c2c_no_browser_nag();

		$this->assertEmpty( wp_check_browser_version() );
	}

}
