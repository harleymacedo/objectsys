<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'O :attribute precisa ser aceito.',
    'active_url'           => 'O :attribute não é uma URL válida.',
    'after'                => 'O :attribute precisa ser uma data depois de :date.',
    'after_or_equal'       => 'O :attribute precisa ser uma data depois ou igual a :date.',
    'alpha'                => 'O :attribute pode conter apenas letras',
    'alpha_dash'           => 'O :attribute pode conter apenas letras, números, espaços e underscores.',
    'alpha_num'            => 'O :attribute pode conter apenas letras e números.',
    'array'                => 'O :attribute precisa ser um array.',
    'before'               => 'O :attribute precisa ser uma data anterior a :date.',
    'before_or_equal'      => 'O :attribute precisa ser uma data anterior ou igual a :date.',
    'between'              => [
        'numeric' => 'O :attribute precisa ser um valor entre :min e :max.',
        'file'    => 'O :attribute precisa ser entre :min and :max kilobytes.',
        'string'  => 'O :attribute precisa ser entre :min and :max caracteres.',
        'array'   => 'O :attribute precisa ser entre :min and :max itens.',
    ],
    'boolean'              => 'O :attribute campo precisa ser verdadeiro ou falso.',
    'confirmed'            => 'O :attribute de confirmação está diferente.',
    'date'                 => 'A :attribute não é uma data válida.',
    'date_format'          => 'A :attribute precisa seguir o seguinte padrão :format.',
    'different'            => 'O :attribute e :other precisam ser diferentes.',
    'digits'               => 'O :attribute precisa ser :digits dígitos.',
    'digits_between'       => 'O :attribute precisa ser entre :min e :max dígitos.',
    'dimensions'           => 'A :attribute possui dimensões de imagens inválidas.',
    'distinct'             => 'O :attribute campo possui valores duplicados.',
    'email'                => 'O :attribute precisa ser um endereço de email válido.',
    'exists'               => 'O :attribute selecionado é inválido.',
    'file'                 => 'O :attribute precisa ser um arquivo.',
    'filled'               => 'O :attribute campo precisa ter um valor.',
    'gt'                   => [
        'numeric' => 'O :attribute precisa ser maior que :value.',
        'file'    => 'O :attribute precisa ser maior que :value kilobytes.',
        'string'  => 'O :attribute precisa ser maior que :value characters.',
        'array'   => 'O :attribute precisa ser maior que :value itens.',
    ],
    'gte'                  => [
        'numeric' => 'O :attribute precisa ser maior ou igual a :value.',
        'file'    => 'O :attribute precisa ser maior ou igual a :value kilobytes.',
        'string'  => 'O :attribute precisa ser maior ou igual a :value caracteres.',
        'array'   => 'O :attribute precisa ter :value itens ou mais.',
    ],
    'image'                => 'O :attribute precisa ser uma imagem.',
    'in'                   => 'O :attribute selecionado é inválido.',
    'in_array'             => 'O campo :attribute não existe em :other.',
    'integer'              => 'O :attribute precis ser um inteiro.',
    'ip'                   => 'O :attribute precisa ser um endereço IP válido.',
    'ipv4'                 => 'O :attribute precisa ser um endereço IPv4 válido.',
    'ipv6'                 => 'O :attribute precisa ser um endereço IPv4 IPv6 válido.',
    'json'                 => 'O :attribute precisa ser um JSON de texto.',
    'lt'                   => [
        'numeric' => 'O :attribute precisa ser menor que :value.',
        'file'    => 'O :attribute precisa ser menor que :value kilobytes.',
        'string'  => 'O :attribute precisa ter menos que :value caracteres.',
        'array'   => 'O :attribute precisa ter menos que :value itens.',
    ],
    'lte'                  => [
        'numeric' => 'O :attribute precisa ser menor ou igual a :value.',
        'file'    => 'O :attribute precisa ser menor ou igual a :value kilobytes.',
        'string'  => 'O :attribute precisa ser menor ou igual a :value caracteres.',
        'array'   => 'O :attribute precisa ter menos ou :value itens.',
    ],
    'max'                  => [
        'numeric' => 'O :attribute não pode ser maior que :max.',
        'file'    => 'O :attribute não pode ser maior que :max kilobytes.',
        'string'  => 'O :attribute não pode ser maior que :max caracteres.',
        'array'   => 'O :attribute não pode conter mais que :max itens.',
    ],
    'mimes'                => 'The :attribute precisa ser um arquivo do tipo: :values.',
    'mimetypes'            => 'O :attribute precisa ser um arquivo dos seguintes tipos type: :values.',
    'min'                  => [
        'numeric' => 'O :attribute precisa ser pelo menos :min.',
        'file'    => 'O :attribute precisa conter pelo menos :min kilobytes.',
        'string'  => 'O :attribute precisa ter pelo menos :min caracteres.',
        'array'   => 'O :attribute precisa conter pelo menos :min itens.',
    ],
    'not_in'               => 'O :attribute selecionado é inválido.',
    'not_regex'            => 'O formato do :attribute é inválido.',
    'numeric'              => 'O :attribute precisa ser um número.',
    'present'              => 'O campo :attribute precisa estar presente.',
    'regex'                => 'O formato do :attribute é inválido.',
    'required'             => 'O campo :attribute é obrigatório.',
    'required_if'          => 'O campo :attribute é obrigatório quando :other é :value.',
    'required_unless'      => 'O campo :attribute é obrigatório exceto quando :other está em :values.',
    'required_with'        => 'O campo :attribute é obrigatório quando :values está presente.',
    'required_with_all'    => 'O campo :attribute é obrigatório quando :values está presente.',
    'required_without'     => 'O campo :attribute é obrigatório quando :values não está presente.',
    'required_without_all' => 'O campo :attribute é obrigatório quando nenhum dos valores :values estão presentes.',
    'same'                 => 'O :attribute e :other precisam ser iguais.',
    'size'                 => [
        'numeric' => 'O :attribute precisa ser :size.',
        'file'    => 'O :attribute precisa ser :size kilobytes.',
        'string'  => 'O :attribute precisa ser :size caracteres.',
        'array'   => 'O :attribute precisa conter :size itens.',
    ],
    'string'               => 'O :attribute precisa ser uma string.',
    'timezone'             => 'O :attribute precisa ser uma zona válida.',
    'unique'               => 'O :attribute já está em uso.',
    'uploaded'             => 'Ops falha ao enviar o :attribute.',
    'url'                  => 'A :attribute possui formato inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
