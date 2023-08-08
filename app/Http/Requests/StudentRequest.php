<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $validates = [];
        $method = $this->route()->getActionMethod();
        switch ($this->method()){
            case 'POST':
                switch ($method){
                    case 'add':
                        $validates = [
                            "name" => 'required',
                            "phone" => 'required|unique:students',
                            "address" => 'required',
                            "image" => 'required'
                        ];
                        break;
                    case 'edit':
                        $validates = [
                            "name" => 'required',
                            "phone" => 'required',
                            "address" => 'required',
                        ];
                        break;
                    default:
                        break;
                }
                break;
            default:
                break;
        }
        return $validates;
    }
    public  function messages()
    {
        return [
            'name.required' => "Vui lòng điền họ tên",
            'phone.required' => "Vui lòng điền Số điện thoại",
            'phone.unique' => "Số điện thoại đã tồn tại",
            'address.required' => "Vui lòng điền địa chỉ",
            'image.required' => "Vui lòng tải ảnh lên"
        ];
    }
}
