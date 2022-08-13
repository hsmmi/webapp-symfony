<?php

namespace App\Requests;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter\ConverterInterface;
/* 
    customize interface for our converter
*/
class ValidateRequest implements ParamConverterInterface
{
    
    public function __construct(private readonly ValidatorInterface $validator)
    {
    }

    public function apply(Request $request, ParamConverter $configuration)
    {
        $className = $configuration->getClass();
        $validatedRequest = new $className($request->toArray(), $this->validator);

        $request->attributes->add('validatedRequest', $validatedRequest);
    }

    public function supports(Configuration $configuration)
    {
        /* 
            at first we want to check if this request is for this converter
            if it's return true, we will run apply
        */
        if ($configuration->getClass() === null) { // can't do anything if we don't have class
            return false;
        }
        
        return is_subclass_of($configuration->getClass(), BaseValidateRequest::class);
    }

}