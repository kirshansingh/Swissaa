<?php

// Add Custom Blocks Panel in Gutenberg
function custom_block_categories( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'project',
                'title' => __( 'SWISSAA', 'css-gutenberg-blocks' ),
            ),
        )
    );
}
add_filter( 'block_categories', 'custom_block_categories', 10, 2 );

function register_acf_block_types() {
    
    // register a faq block.
    acf_register_block_type(array(
      'name'              => 'faq',
      'title'             => __('Faq'),
      'description'       => __('Faq block'),
      'render_template'   => 'template-parts/blocks/faq.php',
      'category'          => 'project',
      'icon'              => '',
      'align'             => 'full',
      'mode'              => 'preview',
      'supports'          => array(
          'align' => array('full'),
          'mode'  => false,
          'anchor' => true,
          'jsx' => true
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            'block_preview_img'   => 'example.jpg'
          )
        )
      )
    ));
    
    // register a team block.
    acf_register_block_type(array(
      'name'              => 'team',
      'title'             => __('Team'),
      'description'       => __('Team block'),
      'render_template'   => 'template-parts/blocks/team.php',
      'category'          => 'project',
      'icon'              => '',
      'align'             => 'full',
      'mode'              => 'preview',
      'supports'          => array(
          'align' => array('full'),
          'mode'  => false,
          'anchor' => true,
          'jsx' => true
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            'block_preview_img'   => 'example.jpg'
          )
        )
      )
    ));
    
    // register a image block.
    acf_register_block_type(array(
      'name'              => 'image',
      'title'             => __('Image'),
      'description'       => __('Image block'),
      'render_template'   => 'template-parts/blocks/image.php',
      'category'          => 'project',
      'icon'              => '',
      'align'             => 'full',
      'mode'              => 'preview',
      'supports'          => array(
          'align' => array('full'),
          'mode'  => false,
          'anchor' => true,
          'jsx' => true
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            'block_preview_img'   => 'example.jpg'
          )
        )
      )
    ));
    
    // register a button block.
    acf_register_block_type(array(
      'name'              => 'button-content',
      'title'             => __('Button'),
      'description'       => __('Button block'),
      'render_template'   => 'template-parts/blocks/button.php',
      'category'          => 'project',
      'icon'              => '',
      'align'             => 'full',
      'mode'              => 'preview',
      'supports'          => array(
          'align' => array('full'),
          'mode'  => false,
          'anchor' => true,
          'jsx' => true
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            'block_preview_img'   => 'example.jpg'
          )
        )
      )
    ));
    
    // register a history block.
    acf_register_block_type(array(
      'name'              => 'history',
      'title'             => __('History'),
      'description'       => __('History block'),
      'render_template'   => 'template-parts/blocks/history.php',
      'category'          => 'project',
      'icon'              => '',
      'align'             => 'full',
      'mode'              => 'preview',
      'supports'          => array(
          'align' => array('full'),
          'mode'  => false,
          'anchor' => true,
          'jsx' => true
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            'block_preview_img'   => 'example.jpg'
          )
        )
      )
    ));
    
    // register a links block.
    acf_register_block_type(array(
      'name'              => 'links',
      'title'             => __('Links'),
      'description'       => __('Links block'),
      'render_template'   => 'template-parts/blocks/link.php',
      'category'          => 'project',
      'icon'              => '',
      'align'             => 'full',
      'mode'              => 'preview',
      'supports'          => array(
          'align' => array('full'),
          'mode'  => false,
          'anchor' => true,
          'jsx' => true
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            'block_preview_img'   => 'example.jpg'
          )
        )
      )
    ));
    
    // register a logo block.
    acf_register_block_type(array(
      'name'              => 'logo',
      'title'             => __('Logo'),
      'description'       => __('Logo block'),
      'render_template'   => 'template-parts/blocks/logo.php',
      'category'          => 'project',
      'icon'              => '',
      'align'             => 'full',
      'mode'              => 'preview',
      'supports'          => array(
          'align' => array('full'),
          'mode'  => false,
          'anchor' => true,
          'jsx' => true
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            'block_preview_img'   => 'example.jpg'
          )
        )
      )
    ));
    
    // register a counter block.
    acf_register_block_type(array(
      'name'              => 'counter',
      'title'             => __('Counter'),
      'description'       => __('Counter block'),
      'render_template'   => 'template-parts/blocks/counter.php',
      'category'          => 'project',
      'icon'              => '',
      'align'             => 'full',
      'mode'              => 'preview',
      'supports'          => array(
          'align' => array('full'),
          'mode'  => false,
          'anchor' => true,
          'jsx' => true
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            'block_preview_img'   => 'example.jpg'
          )
        )
      )
    ));
    
    // register a text block.
    acf_register_block_type(array(
      'name'              => 'text-content',
      'title'             => __('Text'),
      'description'       => __('Text block'),
      'render_template'   => 'template-parts/blocks/text-content.php',
      'category'          => 'project',
      'icon'              => '',
      'align'             => 'full',
      'mode'              => 'preview',
      'supports'          => array(
          'align' => array('full'),
          'mode'  => false,
          'anchor' => true,
          'jsx' => true
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            'block_preview_img'   => 'example.jpg'
          )
        )
      )
    ));
    
    // register a call action block.
    acf_register_block_type(array(
      'name'              => 'call-action',
      'title'             => __('Call Action'),
      'description'       => __('Call Action block'),
      'render_template'   => 'template-parts/blocks/call-action.php',
      'category'          => 'project',
      'icon'              => '',
      'align'             => 'full',
      'mode'              => 'preview',
      'supports'          => array(
          'align' => array('full'),
          'mode'  => false,
          'anchor' => true,
          'jsx' => true
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            'block_preview_img'   => 'example.jpg'
          )
        )
      )
    ));
    
    // register a contact block.
    acf_register_block_type(array(
      'name'              => 'contact',
      'title'             => __('Contact'),
      'description'       => __('Contact block'),
      'render_template'   => 'template-parts/blocks/contact.php',
      'category'          => 'project',
      'icon'              => '',
      'align'             => 'full',
      'mode'              => 'preview',
      'supports'          => array(
          'align' => array('full'),
          'mode'  => false,
          'anchor' => true,
          'jsx' => true
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            'block_preview_img'   => 'example.jpg'
          )
        )
      )
    ));
    
    // register a icon block.
    acf_register_block_type(array(
      'name'              => 'icon',
      'title'             => __('Icon'),
      'description'       => __('Icon block'),
      'render_template'   => 'template-parts/blocks/icon.php',
      'category'          => 'project',
      'icon'              => '',
      'align'             => 'full',
      'mode'              => 'preview',
      'supports'          => array(
          'align' => array('full'),
          'mode'  => false,
          'anchor' => true,
          'jsx' => true
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            'block_preview_img'   => 'example.jpg'
          )
        )
      )
    ));
    
    // register a hero block.
    acf_register_block_type(array(
      'name'              => 'hero',
      'title'             => __('Hero'),
      'description'       => __('Hero block'),
      'render_template'   => 'template-parts/blocks/hero.php',
      'category'          => 'project',
      'icon'              => '',
      'align'             => 'full',
      'mode'              => 'preview',
      'supports'          => array(
          'align' => array('full'),
          'mode'  => false,
          'anchor' => true,
          'jsx' => true
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            'block_preview_img'   => 'example.jpg'
          )
        )
      )
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}
