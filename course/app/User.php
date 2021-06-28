<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Status;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        /*在使用 Laravel 进行项目开发时，我们需要考虑到，
        当一些不怀好意的用户将类似 is_admin 这样的字段也嵌入到表单中进行提交时，
        会有怎样的后果？其后果是用户能够将自己指定为管理员，并进行一些只有管理员才
        能执行的操作，如删除用户，删除帖子等，这即是我们常说的『批量赋值』的错误，
        后面我将在后面章节『进行微博模型构建』时，为你演示『批量赋值』的报错。为了
        提高应用的安全性，Laravel 在用户模型中默认为我们添加了 fillable 在过滤用户
        提交的字段，只有包含在该属性中的字段才能够被正常更新：*/
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ //最后，当我们需要对用户密码或其它敏感信息在用户实例通过数组或 JSON 显示时进行隐藏，则可使用 hidden 属性：
        'password', 'remember_token',
    ];

    public static function boot(){
        parent::boot();

        static::creating(function ($user) {
            $user->activation_token = str_random(30);
        });
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function gravatar($size = '100')
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash?s=$size";
    }

    public function statuses()
    {
        return $this->hasMany(Status::class);
    }
    public function feed(){
        return $this->statuses()
                    ->orderBy('created_at', 'desc');
    }
    // our project
    public function user_type(){
        return $this->belongsTo(user_type::class,'user_type_id');
    }
    public function products(){
        return $this->hasMany(prodcut::class,'farmer_id');
        return $this->hasMany(product::class,'merchant_id');
    }
    
    
    /*
    在开始之前，我们需要在用户模型中定义一个 feed 方法，
    该方法将当前用户发布过的所有微博从数据库中取出，并根据创建时间来倒序排序。
    在后面我们为用户增加关注人的功能之后，将使用该方法来获取当前用户关注的人发布过的所有微博动态。
    现在的 feed 方法定义如下：
     */   
}
