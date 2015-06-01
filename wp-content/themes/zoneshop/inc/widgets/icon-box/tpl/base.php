<?php
/**
 * Created by PhpStorm.
 * User: Anh Tuan
 * Date: 12/3/2014
 * Time: 9:55 AM
 */
/* end setup hover color */

/* setup hover color */
$layout = $instance['layout_group']['icon_style'] <> '' ? $instance['layout_group']['icon_style'] : "layout-01";
//if ( $layout == 'layout-01' )
{
	$data_color = $boxes_icon_style = $css_animation = "";
	if ( $instance['color_group']['icon_hover_color'] <> '' ) {
		$data_icon_hover_color .= ' data-icon="' . $instance['color_group']['icon_hover_color'] . '"';
	}
	if ( $instance['color_group']['icon_bg_color_hover'] <> '' ) {
		$data_icon_bg_color_hover .= ' data-icon-bg="' . $instance['color_group']['icon_bg_color_hover'] . '"';
	}
// custom font heading
	$ct_font_heading = $style_font_heading = $style_padding_widget = '';
	$ct_font_heading .= ( $instance['title_group']['color_title'] != '' ) ? 'color: ' . $instance['title_group']['color_title'] . ';' : '';
	if ( $instance['title_group']['font_heading'] == 'custom' ) {
		$ct_font_heading .= ( $instance['title_group']['custom_font_size'] != '' ) ? 'font-size: ' . $instance['title_group']['custom_font_size'] . 'px;' : '';
		$ct_font_heading .= ( $instance['title_group']['custom_font_weight'] != '' ) ? 'font-weight: ' . $instance['title_group']['custom_font_weight'] . ';' : '';
		$ct_font_heading .= ( $instance['title_group']['custom_mg_bt'] != '' ) ? 'margin-bottom: ' . $instance['title_group']['custom_mg_bt'] . 'px;' : '';
	}
	$ct_font_heading .= ( $instance['color_group']['bg_color'] != '' ) ? ' background-color: ' . $instance['color_group']['bg_color'] : '';

	if ( $ct_font_heading ) {
		$style_font_heading = 'style="' . $ct_font_heading . ';"';
	}

	/* end setup hover color */
	/*********padding-icon-box************/
	$padding_widget = '';
	if ( $instance['layout_group']['padding_widget'] ) {
		$padding_widget .= 'padding:' . $instance['layout_group']['padding_widget'] . ';';

	}
	if ( $instance['title_group']['padding_top'] ) {
		$padding_widget .= 'padding-top:' . $instance['title_group']['padding_top'] . '%;';
	}
	if ( $padding_widget <> '' ) {
		$style_padding_widget = 'style="' . $padding_widget . '"';
	}
// icon style
	$icon_style = $boxes_icon_style = '';
//$icon_style .='(border: 1px solid '.$instance['color_group']['icon_border_color'].')';
	$icon_style .= ( $instance['color_group']['icon_bg_color'] != '' ) ? 'background-color: ' . $instance['color_group']['icon_bg_color'] . ';' : '';
	$icon_style .= ( $instance['color_group']['icon_color'] != '' ) ? 'color: ' . $instance['color_group']['icon_color'] . ';' : '';
	$icon_style .= ( $instance['width_icon_box'] != '' ) ? 'width: ' . $instance['width_icon_box'] . 'px;height: ' . $instance['width_icon_box'] . 'px;border: 1px solid ' . $instance['color_group']['icon_border_color'] . ';line-height: ' . $instance['width_icon_box'] . 'px;' : '';
	if ( $icon_style ) {
		$boxes_icon_style = 'style="' . $icon_style . '"';
	}
// end icon style

// read more button css
	$read_more = $read_more_style = '';
	$read_more .= ( $instance['read_more_group']['read_more_text_color'] != '' ) ? 'color: ' . $instance['read_more_group']['read_more_text_color'] . ';' : '';
	if ( $read_more ) {
		$read_more_style = ' style="' . $read_more . '"';
	}
// end
	$css_animation .= thim_getCSSAnimation( $instance['css_animation'] );

	$prefix = '<div class="wrapper-box-icon' . $css_animation . ' ' . $instance['layout_group']['text_align_sc'] . ' ' . $instance['layout_group']['icon_style'] . '" ' . $data_color . '' . $data_icon_hover_color . '' . $data_icon_bg_color_hover . '>';
	$suffix = '</div> <!--wrapper-box-icon-->';

	$boxes_content_style = $content_style = '';
	if ( $instance['layout_group']['pos'] != ( 'top' or 'center' ) ) {
		$boxes_content_style .= ( $instance['font_awesome_group']['icon'] != 'none' ) ? 'width: calc( 100% - ' . $instance['width_icon_box'] . 'px - 15px);' : '';
	}
	if ( $boxes_content_style ) {
		$content_style = ' style="' . $boxes_content_style . '"';
	}
// show title
	$html_title = '';
	if ( $instance['title_group']['title'] != '' ) {
		$html_title .= '<div class="widget-title-icon-box">';
		$html_title .= '<' . $instance['title_group']['size'] . ' class = "icon-box-title" ' . $style_font_heading . '>';
		$html_title .= $link_prefix . $instance['title_group']['title'] . $link_sufix;
		$html_title .= '</' . $instance['title_group']['size'] . '></div>';
	}
// end show title

	/* show icon or custom icon */
	$html_icon  = $icon_style = '';
	$icon_style = ' ' . $instance['layout_group']['box_icon_style'];
	if ( $instance['icon_type'] == 'font-awesome' ) {
		if ( $instance['font_awesome_group']['icon'] == '' ) {
			$instance['font_awesome_group']['icon'] = 'none';
		}
		if ( $instance['font_awesome_group']['icon'] != 'none' ) {
			$html_icon .= '<div class="wrapper-title-icon' . $icon_style . '" ' . $boxes_icon_style . '>';
			$class = 'fa fa-' . $instance['font_awesome_group']['icon'];
			$style = '';
			$style .= ( $instance['color_group']['icon_color'] != '' ) ? 'color:' . $instance['color_group']['icon_color'] . ';' : '';
			$style .= ( $instance['font_awesome_group']['icon_size'] != '' ) ? ' font-size:' . $instance['font_awesome_group']['icon_size'] . 'px;' : '';
			$html_icon .= '<span class="icon" style="' . $style . '">';
			$html_icon .= '<i class="' . $class . '" ></i>';
			$html_icon .= '</span></div>';
		}
	} else {
		$img = wp_get_attachment_image_src( $instance['font_image_group']['icon_img'], 'full' );
		if ( $img ) {
			$html_icon .= '<div class="wrapper-title-icon' . $icon_style . '" ' . $boxes_icon_style . '>';
			$html_icon .= '<span class="icon icon-images">';
			$style         = $img_icon_size = '';
			$img_icon_size = @getimagesize( $img[0] );
			$html_icon .= '<img ' . $style . ' src="' . $img[0] . '" ' . $img_icon_size[3] . ' alt="" />';
			$html_icon .= '</span></div>';
		}
	}
	/* end show icon or custom icon */

	$hiden_text_css = $hiden_class = '';
	if ( $instance['hidden_text'] == false ) {
		$hiden_text_css .= 'style="visibility: visible"';
		$hiden_class .= ' hidden_text';
	}

	/* show CONTENT*/
	$html_content = $color_desc = '';
	if ( $instance['desc_group']['color_desc'] != '' ) {
		$color_desc = 'style="color:' . $instance['desc_group']['color_desc'] . ' "';
	}

	if ( $instance['desc_group']['content'] != '' ) {
		$html_content .= '<div class="desc-icon-box" ' . $hiden_text_css . '>';
		$html_content .= ( $instance['desc_group']['content'] != '' ) ? '<p class="box-p" ' . $color_desc . '>' . $instance['desc_group']['content'] . '</p>' : '';
		$html_content .= $more_link;
		$html_content .= "</div>";
	}

// html
// background icon-box
	$bg_color_widget = $widget_hover_effect = '';
	if ( $instance['color_group']['bg_color'] ) {
		$bg_color_widget = ' style="background-color:' . $instance['color_group']['bg_color'] . '"';

	}

	if ( $instance['layout_group']['widget_hover_effect'] ) {
		$widget_hover_effect = ' ' . $instance['layout_group']['widget_hover_effect'];
	}

	$html = $prefix;

	$html .= '<div class="smicon-box icon-' . $instance['layout_group']['pos'] . ' ' . $hiden_class . '" ' . $bg_color_widget . '>';
	$html .= '<div class="icon-text' . $widget_hover_effect . '" ' . $style_padding_widget . '>';

// show icon
	$html .= $html_icon;

	$html .= '<div class="content-inner" ' . $content_style . '>';
// show title
	$html .= $html_title;
// show content
	$html .= $html_content;
	$html .= '</div>';

	$html .= '</div>';
	$html .= '</div>';
	$html .= $bg_imge;
	//end div wrapper-box-icon
	$html .= $suffix;
}
if ( $layout == 'layout-02' ) {
	// read more button css
	$read_more = $read_more_style = '';
	$read_more .= ( $instance['read_more_group']['read_more_text_color'] != '' ) ? 'color: ' . $instance['read_more_group']['read_more_text_color'] . ';' : '';
	$read_more_btn = 'margin-top: ' . $instance['read_more_group']['read_more_margin_top'];
	if ( $read_more ) {
		$read_more_style = ' style="' . $read_more . '"';
	}

	$css_animation .= thim_getCSSAnimation( $instance['css_animation'] );
	// Set link to Box
	$more_link = $link_prefix = $link_sufix = '';
	if ( $instance['read_more_group']['link'] != '' ) {
		$more_link = '<div class="read-more-btn" style="' . $read_more_btn . '"><a style="padding: 5px 12px;text-decoration: none;color:' . $instance['read_more_group']['read_more_text_color'] . ';border: 1px solid ' . $instance['read_more_group']['read_more_text_color'] . ';" class="smicon-read sc-btn" href="' . esc_url( $instance['read_more_group']['link'] ) . '" ' . $read_more_style . ' >';
		$more_link .= $instance['read_more_group']['read_text'];
		$more_link .= '</a></div>';
	}
// end
	$css_location = '';
	if ( $instance['desc_group']['content_location'] == 'center' ) {
		$css_location = 'position: absolute;top: 40%';
	}
	$html_content = $color_desc = '';
	if ( $instance['desc_group']['color_desc'] != '' ) {
		$color_desc = 'style="color:' . $instance['desc_group']['color_desc'] . ' "';
	}

	if ( $instance['desc_group']['content'] != '' ) {
		$html_content .= '<div class="desc-icon-box" style="' . $css_location . '" ' . $hiden_text_css . '>';
		$html_content .= ( $instance['desc_group']['content'] != '' ) ? '<p class="box-p" ' . $color_desc . '>' . $instance['desc_group']['content'] . '</p>' : '';
		$html_content .= $more_link;
		$html_content .= "</div>";
	}
	$prefix = '<div style="background: ' . $instance['color_group']['bg_color'] . '" class="wrapper-box-icon' . $css_animation . ' ' . $instance['layout_group']['text_align_sc'] . ' ' . $instance['layout_group']['icon_style'] . '" ' . $data_color . '>';
	$suffix = '</div> <!--wrapper-box-icon-->';

	//Show Image
	$bg_img = wp_get_attachment_url( $instance['image_bg_group']['bg_img'], 'full' );
	if ( $bg_img == '' ) {
		$bg_imge .= '';
	} else {
		$bg_imge_size = '';
		$bg_imge_size = @getimagesize( $bg_img );
		$bg_imge .= '<img src="' . $bg_img . '" ' . $bg_imge_size[3] . ' alt="" style="margin-top: ' . $instance['image_bg_group']['img_margin_top'] . '"/>';
	}
	//Show
	$html .= $prefix;
	$html .= '<div class="icon-box layout-02" style="padding: ' . $instance['layout_group']['widget_padding'] . ';position: relative; text-align: center;">';

	$html .= $html_content;
	$html .= $bg_imge;
	$html .= '</div><!--end content-inner-->';
	$html .= '</div>';
	$html .= $suffix;
}
echo ent2ncr( $html );