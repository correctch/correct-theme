<?php
/**
 * Shortcodes
 */
function pageLink_func($atts)
{
    $a = shortcode_atts(array(
        'id' => 0,
        'title' => 'Hier Seitentitel hinzufügen',
        'desc' => 'Hier Beschreibung hinnzufügen'
    ), $atts);

    if (has_post_thumbnail($a['id'])) {
        $img = get_the_post_thumbnail($a['id'], 'card');
    } else {
        $img = '<img src="https://via.placeholder.com/400x300">';
    }
    return '<article class="cardW pageLink">
			<div class="post-thumbnail">
				<a href="https://webtheke.ch/?p=' . $a['id'] . '">
					' . $img . '
					<h4>' . $a['title'] . '</h4>
					<div class="content">
						' . $a['desc'] . '
					</div>
				</a>
			</div>
		</article>';
}

add_shortcode('pageLink', 'pageLink_func');

function angebot_listing_function($atts) {

	$a = shortcode_atts(array(
        'page_id' => -1,
        'header' => 'Unsere Angebote',
        'button_text' => 'alle Angebote ansehen',
        'hide_more' => 1,
        'limit' => 999,
    ), $atts);


	$sub_pages =  [];

	if ($a['page_id'] > 0) {
		$sub_pages = get_pages(['child_of' => $a['page_id']]);
	}else{
		return '<p>Fehler in der ID</p>';
	}

	$html = '<div class="offer-wrapper"><div class="offerings-header"><h2>'.$a['header'].'</h2></div>';
	$html .= '<div class="offerings row">';
    shuffle($sub_pages);
    $last_key = 0;
	foreach ($sub_pages as $key => $p) {
		if ($key == $a['limit']) {
			break;
		}
		$last_key = $key;
		  if (has_post_thumbnail($p)) {
		        $img = get_the_post_thumbnail($p, 'card');
		    } else {
		        $img = '<img src="https://via.placeholder.com/400x300">';
		    }
		$html .= '<div class="offer col">';
		$html .= $img;	
		$html .= '<div class="offer-content"><div class="offer-title">'.$p->post_title.'</div>';
		$html .= '<a href="'.get_permalink(get_post($p)).'" class="offer-button button">mehr erfahren</a>';
		$html .= '</div></div>';
	}
	$html .= '</div>';
	if ($a['hide_more'] == 0 and $last_key !== sizeof($sub_pages) - 1) {
		$html .= '<div class="offerings-more row"><a href="'.get_permalink(get_post($a['page_id'])).'" class="offer-button button">'.$a['button_text'].'</a></div>';
	}
	$html .= '</div>';
	return $html;
}

add_shortcode('angebote-short', 'angebot_listing_function');
?>