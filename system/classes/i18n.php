<?php defined('SYSPATH') or die('No direct script access.');

if ( ! function_exists('__'))
{
	/**
	 * Kohana translation/internationalization function. The PHP function
	 * [strtr](http://php.net/strtr) is used for replacing parameters.
	 *
	 *    __('Welcome back, :user', array(':user' => $username));
	 *
	 * [!!] The target language is defined by [I18n::$lang].
	 * 
	 * @uses    I18n::get
	 * @param   string  text to translate
	 * @param   array   values to replace in the translated text
	 * @param   string  source language
	 * @return  string
	 */
	function __($string, array $values = NULL, $lang = 'ua')
	{
		if ($lang !== I18n::$lang)
		{
			// The message and target languages are different
			// Get the translation for this message
			$string = I18n::get($string);
		}

		return empty($values) ? $string : strtr($string, $values);
	}
}

class I18n extends Kohana_I18n 
{
	
	const DEFAULT_LANG = 'ua';
	

	/**
	 * @return array 
	 */
	public static function getAvailableLanguages()
	{
		return array(
			'ua' => __('Українська'),
			'en-us' => __('Англійська (США)'),
			'ru' => __('Російська'),
		);
	}
	
	/**
	 * @param string $lang
	 * @return bool
	 */
	public static function isAvailableLanguage($lang)
	{
		$langs = self::getAvailableLanguages();
		
		return isset($langs[$lang]);	
	}
	
	/**
	 * Get and set the target language.
	 *
	 *     // Get the current language
	 *     $lang = I18n::lang();
	 *
	 *     // Change the current language to Spanish
	 *     I18n::lang('es-es');
	 *
	 * @param   string   new language setting
	 * @return  string
	 * @since   3.0.2
	 */
	public static function lang($lang = NULL)
	{
		if($lang && !self::isAvailableLanguage($lang))
		{
			throw new Exception('Wrong language');
		}

		return parent::lang($lang);
	}
	
	/**
	 * Returns translation of a string. If no translation exists, the original
	 * string will be returned. No parameters are replaced.
	 *
	 *     $hello = I18n::get('Hello friends, my name is :name');
	 *
	 * @param   string   text to translate
	 * @param   string   target language
	 * @return  string
	 */
	public static function get($string, $lang = NULL)
	{
		if ( ! $lang)
		{
			// Use the global target language
			$lang = I18n::$lang;
		}

		// Load the translation table for this language
		$table = I18n::load($lang);

		// Return the translated string if it exists
		$result = !empty($table[$string]) ? $table[$string] : $string;
	
		if(!isset($table[$string]))
		{
			self::savePhrase($string, $lang);
		}
		
		return $result;
	}
		
	/**
	 * @param string $lang
	 * @param array $filter
	 * @return array
	 */
	public static function load($lang, $filter = array())
	{
		$result = parent::load($lang);
		
		if(!empty($filter))
		{
			foreach($result as $phrase => $translation)
			{
				$matched = true;
			
				if(isset($filter['showOnlyNotTranslated']) && $filter['showOnlyNotTranslated'] == 'true' && $translation)
				{
					$matched = false;
				}
				
				if(isset($filter['searchTerm']) && $filter['searchTerm'] && mb_stripos($phrase, $filter['searchTerm']) === false)
				{
					$matched = false;
				}
				
				if(!$matched)
				{
					unset($result[$phrase]);
				}
			}
		}
				
		return $result;
	} 
		
	/**
	 * Writes word into the file with translations
	 * 
	 * if $translation == false, phrase will be removed
	 *  
	 */
	public static function savePhrase($phrase, $lang, $translation = '')
	{
		$sem = sem_get(1, 1);

		if(sem_acquire($sem)) 
		{
			try
			{
				//build path to file
				$path_parts = explode('-', $lang);
        		$file_path = APPPATH . 'i18n' . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $path_parts) . '.php';

				$phrases = Kohana::load($file_path);
        
        		if($translation === false)
        		{
        			unset($phrases[$phrase]);
        		}
        		else
        		{
        			$phrases[$phrase] = $translation;
        		}
				
        
				//make new file content
				$content =  "<?php defined('SYSPATH') or die('No direct script access.');\n\n";
				$content .= "return ".var_export($phrases, true).";\n";

				file_put_contents($file_path, $content);
			}
			catch(Exception $e){}
			
			sem_release($sem);
		}
	}
	
	/**
	 * Method removes phrase
	 */
	public static function removePhrase($phrase, $lang)
	{
		self::savePhrase($phrase, $lang, false);
	}
	
}



