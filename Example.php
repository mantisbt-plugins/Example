<?php
class ExamplePlugin extends MantisPlugin {
    function register() {
        $this->name = 'Example';    # Proper name of plugin
        $this->description = '';    # Short description of the plugin
        $this->page = '';           # Default plugin page

        $this->version = '1.0';     # Plugin version string
        $this->requires = array(    # Plugin dependencies, array of basename => version pairs
            'MantisCore' => '1.2.0, <= 1.2.0',  #   Should always depend on an appropriate version of MantisBT
        );

        $this->author = '';         # Author/team name
        $this->contact = '';        # Author/team e-mail address
        $this->url = '';            # Support webpage
    }

    function events() {
        return array(
            'EVENT_EXAMPLE_FOO' => EVENT_TYPE_EXECUTE,
            'EVENT_EXAMPLE_BAR' => EVENT_TYPE_CHAIN,
        );
    }

    function hooks() {
        return array(
            'EVENT_EXAMPLE_FOO' => 'foo',
            'EVENT_EXAMPLE_BAR' => 'bar',
        );
    }

    function config() {
        return array(
            'foo_or_bar' => 'foo',
        );
    }

    function foo( $p_event ) {
        echo 'In method foo(). ';
    }

    function bar( $p_event, $p_chained_param ) {
        return str_replace( 'foo', 'bar', $p_chained_param );
    }

}
