# Hau Tak Church 2020 Wordpress Theme

Hau Tak Church website was built with Bootstrap CSS framework, with PHP, MySQL database as backend. This is a theme for hautakchurch.org as you may curious about, and is developed by using `underscores` as starter theme.

## Features

- Modern & clean webpage design
- Custom post type for more customization
- Custom header (nav) with animation hamburger
- Customize function.php
- Multi pages templates

### Webpage Design

The website has been rebuilt for many times. It was just a dynamic website with PHP as backend hosted with Synology server. If user want to edit the content, they have to access to the database directly. Also, the design is very old and it is not even responsive.

Recently, I planned to rebuild this site into a wordpress based site. The reason why I decided to make this decision is because using wordpress as CMS provide better user-experience for admin who have to constantly update the content.

The approach is start is to create a custom theme from Underscores. Also, I would like to make some changes on the design and the styling of the content to make the site more attractive.

![index (Desktop - 1440px)](https://user-images.githubusercontent.com/62586450/105279788-45b31480-5be3-11eb-8362-36f25f4b62b7.jpg)

### Content Management System

As this project targets the needed of the church, which required to upload audios and edit notices frequency. I chose wordpress as the CMS while develop my own theme for fully customization.

Moreover, for the audio recordings. I created a custom post type for it with customized metadata. This allowed the user the upload the recordings which fit in into the recordings componenets template that I designed. Same for the events, activities and documents,.

<img width="1255" alt="截圖 2021-01-21 12 30 16" src="https://user-images.githubusercontent.com/62586450/105280307-6cbe1600-5be4-11eb-8a27-cc3dea081a5f.png">

#### Adding hooks for custom post type

```php
// Custom Post Type Recording
function recording() {
	$labels = array (
		'name'				=> '講道錄音',
		'singular_name' 	=> '講道錄音',
		'menu_name'			=> '講道錄音',
		'add_new_item' 		=> '添加講道錄音',
		'add_new' 			=> '添加新的講道錄音',
		);
	$args = array (
		'label'				=> __('recording'),
		'labels'			=> $labels,
		'supports'			=> array('title', 'editor', 'thumbnail'),
		'show_in_rest' 		=> true,
		'public'			=> true,
		'show_ui'			=> true,
		'capability_type'	=> 'post',
		'menu_icon'			=> 'dashicons-format-audio',
		'taxonomies'          => array( 'category' )
		);
	register_post_type('recording',$args);

}

add_action('init', 'recording');
```

#### Adding hooks for custom post type metadata

```php
function recording_add_meta_box() {
	add_meta_box( 'recording_meta', '資料', 'recording_meta_callback', 'recording','side');
}

function recording_meta_callback($post) {
	wp_nonce_field('save_recording_meta_data', 'recording_meta_metabox_nounce');

	$value = get_post_meta($post->ID, '_preacher_name_value_key', true);
	echo '<label for="preacher_name_field" style="padding: 5px 3px; display: block">講員</label>';
	echo '<input type="text" id="preacher_name_field" name="preacher_name_field" style="margin-bottom: 10px" value="' .esc_attr($value).'" />';

	$value2 = get_post_meta($post->ID, '_bible_verse_value_key', true);
	echo '<label for="bible_verse_field" style="padding: 5px 3px; display: block">經文</label>';
	echo '<input type="text" id="bible_verse_field" name="bible_verse_field" value="' .esc_attr($value2).'" />';

}

add_action('add_meta_boxes', 'recording_add_meta_box');
```

There are more and more features and ideas included in this theme. Feel free to explore more...

## Installation

Clone this by the following command. (cd to the /themes folder)

```sh
sudo git clone https://github.com/IamMrandrew/hautakchurch2020-wp-theme.git
```

### API Key

This theme required an api key file to work for google map (key.php)
