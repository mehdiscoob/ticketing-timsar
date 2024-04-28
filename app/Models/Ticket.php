<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_from',
        'user_to',
        'ticket_id',
        'type',
        'status',
        'text',
        'title',
        'relation_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'user_from' => 'integer',
        'user_to' => 'integer',
        'ticket_id' => 'integer',
        'relation_id' => 'integer',
    ];

    /**
     * Define the relationship with the "from" user.
     */
    public function fromUser()
    {
        return $this->belongsTo(User::class, 'user_from');
    }

    /**
     * Define the relationship with the "to" user.
     */
    public function toUser()
    {
        return $this->belongsTo(User::class, 'user_to');
    }

    /**
     * Define the relationship with the parent ticket.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    /**
     * Define the relationship with a related ticket.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hasTicket()
    {
        return $this->hasOne(Ticket::class, 'ticket_id');
    }

}
