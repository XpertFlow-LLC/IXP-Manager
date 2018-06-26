<?php

namespace IXP\Http\Requests;

/*
 * Copyright (C) 2009-2017 Internet Neutral Exchange Association Company Limited By Guarantee.
 * All Rights Reserved.
 *
 * This file is part of IXP Manager.
 *
 * IXP Manager is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation, version v2.0 of the License.
 *
 * IXP Manager is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for
 * more details.
 *
 * You should have received a copy of the GNU General Public License v2.0
 * along with IXP Manager.  If not, see:
 *
 * http://www.gnu.org/licenses/gpl-2.0.html
 */

use Auth;

use Entities\{
    FaucetController as FaucetControllerEntity,
    User as UserEntity
};

use Illuminate\Foundation\Http\FormRequest;


class StoreFaucetController extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // middleware ensures superuser access only so always authorised here:
        return Auth::getUser()->isSuperUser();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */    
    public function rules()
    {
        $this->merge( [ 'handle' => preg_replace( "/[^a-z0-9\-]/", '' , strtolower( $this->input( 'handle', '' ) ) ) ] );

        return [
            'handle'                    => 'required|string|max:255|unique:Entities\FaucetController,handle' . ( $this->input('id') ? ','. $this->input('id') : '' ),
            'vlan'                      => 'required|integer',
            'controller_ip'             => 'required|string|max:255',
            'controller_port'           => 'required|integer',
            'api'                       => 'string|max:255',
            'faucet_version'            => 'required|string|max:255',
            'faucet_config'             => 'required|string|max:255',
            'faucet_config_stat_reload' => 'integer',
            'faucet_log'                => 'required|string|max:255',
//            'faucet_exception_log'      => 'required|string|max:255',
            'faucet_event_sock'         => 'string|max:255',
            'faucet_prometheus_port'    => 'required|integer',
            'faucet_prometheus_addr'    => 'required|string|max:255',      
            'faucet_pipeline_dir'       => 'required|string|max:255',
            'gauge_config'              => 'required|string|max:255',
            'gauge_config_stat_reload'  => 'integer',
            'gauge_log'                 => 'required|string|max:255',
            'gauge_exception_log'       => 'required|string|max:255',
            'gauge_prometheus_addr'     => 'required|string|max:255',
            'gauge_prometheus_port'     => 'required|integer',

        ];
        
    }
    /** 
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'api.regex' => 'The API URL must not end with a trailing slash',
        ];
    }

}