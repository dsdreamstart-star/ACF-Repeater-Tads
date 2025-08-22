<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Elementor_ACF_Repeater_Tabs_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'acf-repeater-tabs';
    }

    public function get_title() {
        return __( 'ACF Repeater Tabs', 'acf-repeater-tabs' );
    }

    public function get_icon() {
        return 'eicon-tabs';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function _register_controls() {
        // --- CONTENT TAB ---
        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Settings', 'acf-repeater-tabs' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'repeater_field_name',
            [
                'label' => __( 'Repeater Field Name', 'acf-repeater-tabs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => __( 'e.g. my_repeater_field', 'acf-repeater-tabs' ),
                'description' => __( 'Enter the name of the ACF Repeater field.', 'acf-repeater-tabs' ),
            ]
        );

        $this->add_control(
            'tab_title_sub_field',
            [
                'label' => __( 'Tab Title Sub Field', 'acf-repeater-tabs' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => __( 'e.g. tab_title', 'acf-repeater-tabs' ),
                'description' => __( 'Enter the sub field name for the tab title.', 'acf-repeater-tabs' ),
            ]
        );

        $this->add_control(
            'tab_content_template',
            [
                'label' => __( 'Tab Content Template', 'acf-repeater-tabs' ),
                'type' => \Elementor\Controls_Manager::QUERY,
                'label_block' => true,
                'query' => [
                    'post_type' => 'elementor_library',
                ],
                'description' => __( 'Select an Elementor template for the tab content.', 'acf-repeater-tabs' ),
            ]
        );

        $this->end_controls_section();

        // --- STYLE TAB: TITLES ---
        $this->start_controls_section(
            'section_style_titles',
            [
                'label' => __( 'Titles', 'acf-repeater-tabs' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .elementor-tab-title',
            ]
        );

        $this->add_responsive_control(
            'title_padding',
            [
                'label' => __( 'Padding', 'acf-repeater-tabs' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-tab-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs( 'tabs_title_style' );

        // Normal
        $this->start_controls_tab(
            'tab_title_normal',
            [ 'label' => __( 'Normal', 'acf-repeater-tabs' ) ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Color', 'acf-repeater-tabs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .elementor-tab-title' => 'color: {{VALUE}}' ],
            ]
        );
        $this->add_control(
            'title_bg_color',
            [
                'label' => __( 'Background Color', 'acf-repeater-tabs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .elementor-tab-title' => 'background-color: {{VALUE}}' ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'title_border',
                'selector' => '{{WRAPPER}} .elementor-tab-title',
            ]
        );
        $this->end_controls_tab();

        // Hover
        $this->start_controls_tab(
            'tab_title_hover',
            [ 'label' => __( 'Hover', 'acf-repeater-tabs' ) ]
        );
        $this->add_control(
            'title_color_hover',
            [
                'label' => __( 'Color', 'acf-repeater-tabs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .elementor-tab-title:hover' => 'color: {{VALUE}}' ],
            ]
        );
        $this->add_control(
            'title_bg_color_hover',
            [
                'label' => __( 'Background Color', 'acf-repeater-tabs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .elementor-tab-title:hover' => 'background-color: {{VALUE}}' ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'title_border_hover',
                'selector' => '{{WRAPPER}} .elementor-tab-title:hover',
            ]
        );
        $this->end_controls_tab();

        // Active
        $this->start_controls_tab(
            'tab_title_active',
            [ 'label' => __( 'Active', 'acf-repeater-tabs' ) ]
        );
        $this->add_control(
            'title_color_active',
            [
                'label' => __( 'Color', 'acf-repeater-tabs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .elementor-tab-title.elementor-active' => 'color: {{VALUE}}' ],
            ]
        );
        $this->add_control(
            'title_bg_color_active',
            [
                'label' => __( 'Background Color', 'acf-repeater-tabs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .elementor-tab-title.elementor-active' => 'background-color: {{VALUE}}' ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'title_border_active',
                'selector' => '{{WRAPPER}} .elementor-tab-title.elementor-active',
            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->end_controls_section();

        // --- STYLE TAB: CONTENT ---
        $this->start_controls_section(
            'section_style_content',
            [
                'label' => __( 'Content', 'acf-repeater-tabs' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .elementor-tab-content',
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => __( 'Color', 'acf-repeater-tabs' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .elementor-tab-content' => 'color: {{VALUE}}' ],
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __( 'Padding', 'acf-repeater-tabs' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-tab-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $repeater_field_name = $settings['repeater_field_name'];
        $tab_title_sub_field = $settings['tab_title_sub_field'];
        $template_id = $settings['tab_content_template'];

        if ( empty( $repeater_field_name ) || empty( $tab_title_sub_field ) || empty( $template_id ) ) {
            if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
                echo '<p>' . __( 'Please fill in all fields in the settings tab.', 'acf-repeater-tabs' ) . '</p>';
            }
            return;
        }

        $rows = get_field( $repeater_field_name );

        if ( $rows ) {
            $tabs_id = 'acf-repeater-tabs-' . $this->get_id();
            $elementor_frontend = \Elementor\Plugin::$instance->frontend;
            ?>
            <div class="elementor-tabs" id="<?php echo esc_attr( $tabs_id ); ?>" role="tablist">
                <div class="elementor-tabs-wrapper">
                    <?php foreach ( $rows as $index => $row ) : 
                        $tab_title = isset( $row[$tab_title_sub_field] ) ? $row[$tab_title_sub_field] : '';
                        $tab_id = 'elementor-tab-title-' . $this->get_id() . ( $index + 1 );
                    ?>
                        <div class="elementor-tab-title <?php echo ( $index === 0 ) ? 'elementor-active' : ''; ?>" data-tab="<?php echo $index + 1; ?>" role="tab" aria-controls="<?php echo esc_attr( $tab_id ); ?>">
                            <?php echo esc_html( $tab_title ); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="elementor-tabs-content-wrapper">
                     <?php foreach ( $rows as $index => $row ) : 
                        $tab_content_id = 'elementor-tab-content-' . $this->get_id() . ( $index + 1 );
                     ?>
                        <div class="elementor-tab-content elementor-clearfix <?php echo ( $index === 0 ) ? 'elementor-active' : ''; ?>" id="<?php echo esc_attr( $tab_content_id ); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr( 'elementor-tab-title-' . $this->get_id() . ( $index + 1 ) ); ?>">
                            <?php echo $elementor_frontend->get_builder_content_for_display( $template_id ); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php
        } elseif ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
            echo '<p>' . __( 'ACF Repeater field has no rows or the field name is incorrect.', 'acf-repeater-tabs' ) . '</p>';
        }
    }

    
}
