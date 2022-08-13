<?php
/* 
    Using psr-4 autoloader
    "psr-4": {
        "App\\": "src/"
    }
 */
namespace App\Requests;

class Product extends BaseValidateRequest
{
/* 
    Readonly: after you set it, you can't change it
*/    

    #[Assert\NotBlank]
    #[Assert\NotNull]
    #[Assert\Length(min: 4, max: 255)]
    public readonly ?string $title;

    #[Assert\NotNull]
    #[Assert\PositiveOrZero]
    public readonly ?int $stock;

    /* 
        go to baseValidateRequest and use it
        to don't write code every time
    */
    // // constroctor
    // public function __construct(array $fields, ValidatorInterface $validator)
    // {
    //     // dd($fields);
    //     foreach ($fields as $field => $value) {
    //         if (property_exists($this, $field)) { // check if exist in class
    //             $this->{$field} = $value; // {} beacuse it's variable
    //         }
    //         // property_exists($this, $field) ? $this->$field = $value : null;
    //     }

    //     $this->validator = $validator;
    // }

    // private function validate(ValidatorInterface $validator): void
    // {
    //     $error = $validator->validate($this);
        
    //     // you should handle exeptoin
    //     if ($errors->count()) {
    //         throw new Exception();
    //     }
    // }

    
}