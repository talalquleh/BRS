<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBorrowRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'status'=>'required|in:PENDING,ACCEPTED,REJECTED,RETURNED',
            'request_processed_at'  => 'nullable|date|date_format:Y-m-d',
            'deadline'   => 'nullable|date|date_format:Y-m-d',
            'returned_at'     => 'nullable|date|date_format:Y-m-d',
        ];
    }
}
