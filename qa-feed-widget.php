<?php
	class qa_feed_widget {
	
		function admin_form()
		{
			$saved=false;
			
			if (qa_clicked('qa_feed_save_button')) {
				qa_opt('qa_feed_title', qa_post_text('qa_feed_title_field'));
				qa_opt('qa_feed_url', qa_post_text('qa_feed_url_field'));
				qa_opt('qa_feed_count', (int)qa_post_text('qa_feed_count_field'));
				$saved=true;
			}
			
			return array(
				'ok' => $saved ? 'Feed Widget settings saved' : null,
				
				'fields' => array(
					array(
						'label' => 'Widget Title:',
						'type' => 'string',
						'value' => qa_opt('qa_feed_title'),
						'tags' => 'NAME="qa_feed_title_field"',
					),
					array(
						'label' => 'Feed URL:',
						'type' => 'string',
						'value' => qa_opt('qa_feed_url'),
						'tags' => 'NAME="qa_feed_url_field"',
					),
					array(
						'label' => 'number of recent feeds:',
						'suffix' => 'item',
						'type' => 'number',
						'value' => (int)qa_opt('qa_feed_count'),
						'tags' => 'NAME="qa_feed_count_field"',
					),
				),
				'buttons' => array(
					array(
						'label' => 'Save Changes',
						'tags' => 'NAME="qa_feed_save_button"',
					),
				),
			);
		}

		
		function allow_template($template)
		{
			$allow=false;
			
			switch ($template)
			{
				case 'activity':
				case 'qa':
				case 'questions':
				case 'hot':
				case 'ask':
				case 'categories':
				case 'question':
				case 'tag':
				case 'tags':
				case 'unanswered':
				case 'user':
				case 'users':
				case 'search':
				case 'admin':
				case 'custom':
					$allow=true;
					break;
			}
			
			return $allow;
		}

		
		function allow_region($region)
		{
			return ($region=='side');
		}
		

		function output_widget($region, $place, $themeobject, $template, $request, $qa_content)
		{
			$url = qa_opt('qa_feed_url');
			$count=(int)qa_opt('qa_feed_count');
			$title=qa_opt('qa_feed_title');

			$themeobject->output('<aside class="qa-feed-widget">');
				$themeobject->output('<H2 class="qa-feed-header" style="margin-top:0; padding-top:0;">'.$title.'</H2>');
				
			$content = file_get_contents($url); 
			$x = new SimpleXmlElement($content);  
			echo '<ul class="qa-feed-list">'; 
			$i=0;
			foreach($x->channel->item as $entry) {  
				echo "<li class=\"qa-feed-item\"><a href='$entry->link' title='$entry->title'>" . $entry->title . "</a></li>";  
				$i++;
				if ($i>=$count)
					break;
			}  
			echo "</ul>";  
			
			
			$themeobject->output('</aside>');
		}
		
	}

/*
	Omit PHP closing tag to help avoid accidental output
*/