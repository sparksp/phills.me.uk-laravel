<?php namespace Snip;

use Eloquent\Model as Eloquent;
use Auth, Input, Str, Validator, URL;

/**
 * A Snip is a bit of code.
 * 
 * @package   Snip
 * @category  Bundle
 * @author    Phill Sparks <me@phills.me.uk>
 * @copyright 2012 Phill Sparks
 * @license   MIT License <http://www.opensource.org/licenses/mit>
 */
class Model extends Eloquent {
	
	/**
	 * @var boolean
	 */
	public static $timestamps = true;

	/**
	 * @var string
	 */
	public static $table = 'snips';
	
	/**
	 * Gets a list of Language Options.
	 * 
	 * @return array
	 */
	static function language_options()
	{
		return array(
			'actionscript' => 'ActionScript',
			'applescript'  => 'AppleScript',
			'bash'         => 'Bash',
			'cfm'          => 'ColdFusion',
			'cpp'          => 'C++',
			'csharp'       => 'C#',
			'css'          => 'CSS',
			'delphi'       => 'Delphi',
			'diff'         => 'Diff',
			'erlang'       => 'Erlang',
			'groovy'       => 'Groovy',
			'html'         => 'HTML',
			'java'         => 'Java',
			// 'javafx'       => 'Java FX',
			'javascript'   => 'Javascript',
			'perl'         => 'Perl',
			'php'          => 'PHP',
			''             => 'Plain text', // 'plain'
			'powershell'   => 'PowerShell',
			'python'       => 'Python',
			'ruby'         => 'Ruby',
			'sass'         => 'SASS',
			'scala'        => 'Scala',
			'sql'          => 'SQL',
			'vb'           => 'VisualBasic',
			'xml'          => 'XML',
		);
	}
	
	/**
	 * Validate Input data for this model.
	 * 
	 * @return Laravel\Messages  Any errors found during validation.
	 */
	public function validate()
	{
		$rules = array(
			'title'    => 'required',
			'body'     => 'required',
			'language' => 'in:'.implode(',', array_keys(self::language_options())),
		);

		$validator = new Validator( Input::all(), $rules );

		if ( $validator->valid() )
		{
			$this->title       = Input::get('title');
			$this->description = Input::get('description');
			$this->body        = Input::get('body');
			$this->language    = Input::get('language');
			$this->tags        = Input::get('tags');
			
			if (empty($this->slug))
			{
				$this->slug = Str::slug($this->title, '-');
			}
			if (empty($this->user_id))
			{
				$this->user_id = Auth::user()->id;
			}
		}

		return $validator->errors;
	}
	
	/**
	 * Gets a query to the user that owns this snip.
	 * 
	 * @return Laravel\Database\Query
	 */
	public function user()
	{
		return $this->belongs_to('User\\Model');
	}

	/**
	 * Gets the URI for this snip.
	 */
	public function uri()
	{
		return URL::to_action('snip::home@show', array($this->id));
	}

	/**
	 * Gets the URL for this snip.
	 */
	public function url()
	{
		$slug = $this->slug ?: Str::slug($this->title, '-');
		return URL::to_action('snip::home@detail', array($this->id, $slug));
	}

}
