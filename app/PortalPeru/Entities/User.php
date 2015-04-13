<?php namespace PortalPeru\Entities;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseEntity implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public function category()
    {
        return $this->hasMany('PortalPeru\Entities\Category');
    }

    public function post()
    {
        return $this->hasMany('PortalPeru\Entities\Post');
    }

    public function postPublicar()
    {
        return $this->hasMany('PortalPeru\Entities\Post')->wherePublicar(1)->count();
    }

    public function page()
    {
        return $this->hasMany('PortalPeru\Entities\Page');
    }

    public function tag()
    {
        return $this->hasMany('PortalPeru\Entities\Tag');
    }

    public function profile()
    {
        return $this->hasOne('PortalPeru\Entities\UserProfile', 'user_id', 'id');
    }

    protected $hidden = array('password');

    protected $fillable = array('email', 'password');

    public function setPasswordAttribute($value)
    {
        if (!empty ($value)) {
            $this->attributes['password'] = \Hash::make($value);
        }
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    public function isValid($data)
    {
        $rules = array(
            'email'     => 'required|email|unique:users'
        );

        // Si el usuario existe:
        if ($this->exists){
            //Evitamos que la regla “unique” tome en cuenta el email del usuario actual
            $rules['email'] .= ',email,' . $this->id;
        }else{ // Si no existe...
            // La clave es obligatoria:
            $rules['password'] .= '|required';
        }

        $validator = \Validator::make($data, $rules);

        if ($validator->passes()){
            return true;
        }

        $this->errors = $validator->errors();

        return false;
    }

    function isAdmin()
    {
        return $this->type == 'admin';
    }

    function isEditor()
    {
        return $this->type == 'editor';
    }

    function isReportero()
    {
        return $this->type == 'reportero';
    }

}