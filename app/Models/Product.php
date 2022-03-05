<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'price', 'poster', 'brand', 'category_id'
    ];

    /**
     * Notes: 一个产品只属于一个分类
     * @interface: category
     * @url:
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author: wxvirus
     * Time: 2022/3/5 3:33 下午
     */
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Notes: 修改获取资源的方式
     * @interface: getRouteKeyName
     * @url:
     * @return string
     * @author: wxvirus
     * Time: 2022/3/5 3:41 下午
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
