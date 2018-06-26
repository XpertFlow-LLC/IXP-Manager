<?php

namespace IXP\Http\Controllers;

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

use D2EM, Former, Input, Redirect;

use Entities\{
    FaucetController as FaucetControllerEntity,
    Vlan as VlanEntity,
    User as UserEntity
};

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View as FacadeView;
use Illuminate\View\View;

use IXP\Http\Requests\StoreFaucetController;

use IXP\Utils\View\Alert\Alert;
use IXP\Utils\View\Alert\Container as AlertContainer;

use Repositories\Vlan as VlanRepository;

/**
 * Faucet Controller
 * @author     Barry O'Donovan <barry@islandbridgenetworks.ie>
 * @author     Yann Robin <yann@islandbridgenetworks.ie>
 * @copyright  Copyright (C) 2009-2017 Internet Neutral Exchange Association Company Limited By Guarantee
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU GPL V2.0
 */
class SDNController extends Controller
{

    /**
     * Display all the faucet_controllers
     *
     * @return  View
     */
    public function list( ): View {
        return view( 'faucet-controller/index' )->with([
            'faucet_controller'       => D2EM::getRepository( FaucetControllerEntity::class )->findAll()
        ]);
    }

    /**
     * Status page for faucet_controllers
     *
     * @return  View
     */
    public function status(): View {

        /** @var FaucetControllerEntity[] $faucet_controllers */
        $faucet_controllers = D2EM::getRepository( FaucetControllerEntity::class )->findAll();

        $faucet_controllersWithApi = [];
        foreach( $faucet_controllers as $fct ) {
            if( $fct->hasApi() ) {
                $faucet_controllersWithApi[] = $fct->getHandle();
            }
        }

        return view( 'faucet-controller/status' )->with([
            'faucet_controllers'        => $faucet_controllers,
            'faucet_controllersWithApi' => $faucet_controllersWithApi,
        ]);
    }


    /**
     * Display the form to edit a faucet_controllers
     *
     * @param  int    $id        faucet_controllers that need to be edited
     * @return View
     */
    public function edit( int $id = null ): View {
        /** @var FaucetControllerEntity $fct */
        if( $id ) {
            if( !( $fct = D2EM::getRepository( FaucetControllerEntity::class )->find( $id ) ) ) {
                abort( 404 );
            }
        } else {
            $fct = new FaucetControllerEntity;
        }

        // fill the form with faucet_controllers data
        Former::populate([
            'handle'                        => $fct->getHandle(),
            'vlan'                          => $fct->getVlan(),
            'controller_ip'                 => $fct->getControllerIp(),
            'controller_port'               => $fct->getControllerPort(),
            'api'                           => $fct->getApi(),
            'faucet_version'                => $fct->getFaucetVersion(),
            'faucet_config'                 => $fct->getFaucetConfig(),
            'faucet_config_stat_reload'     => $fct->getFaucetConfigStatReload() ? 1 : 0,
            'faucet_log'                    => $fct->getFaucetLog(),
            'faucet_exception_log'          => $fct->getFaucetExceptionLog(),
            'faucet_event_sock'             => $fct->getFaucetEventSock(),
            'faucet_prometheus_port'        => $fct->getFaucetPrometheusPort(),
            'faucet_prometheus_addr'        => $fct->getFaucetPrometheusAddr(),
            'faucet_pipeline_dir'           => $fct->getFaucetPipelineDir(),
            'gauge_config'                  => $fct->getGaugeConfig(),
            'gauge_config_stat_reload'      => $fct->getGaugeConfigStatReload() ? 1 : 0,
            'gauge_log'                     => $fct->getGaugeLog(),
            'gauge_exception_log'           => $fct->getGaugeExceptionLog(),
            'gauge_prometheus_addr'         => $fct->getGaugePrometheusAddr(),
            'gauge_prometheus_port'         => $fct->getGaugePrometheusPort()
        ]);

        /** @noinspection PhpUndefinedMethodInspection - need to sort D2EM::getRepository factory inspection */
        return view( 'faucet-controller/edit' )->with([
            'fct'               => $fct,
            'edit'              => $id  ? true : false,
            'vlans'             => D2EM::getRepository( VlanEntity::class )->getNames( VlanRepository::TYPE_NORMAL ),
        ]);
    }



    /**
     * Add or edit a faucet_controllers (set all the data needed)
     *
     * @param   StoreFaucetController $request instance of the current HTTP request
     * @return  RedirectResponse
     */
    public function store( StoreFaucetController $request ): RedirectResponse {

        /** @var FaucetControllerEntity $fct */
        if( $request->input( 'id' ) && $fct = D2EM::getRepository( FaucetControllerEntity::class )->find( $request->input( 'id' ) ) ) {
            if( !$fct ) {
                abort(404, 'Unknown controller');
            }
        } else {
            $fct = new FaucetControllerEntity;
            D2EM::persist($fct);
        }

        /** @var VlanEntity $vlan */
        if( !( $vlan = D2EM::getRepository( VlanEntity::class )->find( $request->input( 'vlan' ) ) ) ) {
            abort(404, 'Unknown vlan');
        }

        $fct->setHandle( $request->input( 'handle' ) );
        $fct->setVlan( $vlan );
        $fct->setControllerIp( $request->input( 'controller_ip' ) );
        $fct->setControllerPort( $request->input( 'controller_port' ) );
        $fct->setApi( $request->input( 'api' ) );
        $fct->setFaucetVersion( $request->input( 'faucet_version' ) );
        $fct->setFaucetConfig( $request->input( 'faucet_config' ) );
        $fct->setFaucetConfigStatReload( ( $request->input( 'faucet_config_stat_reload' ) ) ? $request->input( 'faucet_config_stat_reload' ) : false);
        $fct->setFaucetLog( $request->input( 'faucet_log' ) );
        $fct->setFaucetExceptionLog( $request->input( 'faucet_exception_log' ) );
        $fct->setFaucetEventSock( $request->input( 'faucet_event_sock' ) );
        $fct->setFaucetPrometheusPort( $request->input( 'faucet_prometheus_port' ) );
        $fct->setFaucetPrometheusAddr( $request->input( 'faucet_prometheus_addr' ) );
        $fct->setFaucetPipelineDir( $request->input( 'faucet_pipeline_dir' ) );
        $fct->setGaugeConfig( $request->input( 'gauge_config' ) );
        $fct->setGaugeConfigStatReload( ( $request->input( 'gauge_config_stat_reload' ) ) ? $request->input( 'gauge_config_stat_reload' ) : false);
        $fct->setGaugeLog( $request->input( 'gauge_log' ) );
        $fct->setGaugeExceptionLog( $request->input( 'gauge_exception_log' ) );
        $fct->setGaugePrometheusAddr( $request->input( 'gauge_prometheus_addr' ) );
        $fct->setGaugePrometheusPort( $request->input( 'gauge_prometheus_port' ) );

        D2EM::flush();

        AlertContainer::push( 'Controller added/updated successfully.', Alert::SUCCESS );
        return Redirect::to( 'faucet-controller/list');
    }


    /**
     * Display the details of a faucet_controllers
     *
     * @param  int    $id        faucet_controllers that need to be displayed
     * @return View
     */
    public function view( int $id ): View {
        /** @var FaucetControllerEntity $fct */
        if( !( $fct = D2EM::getRepository( FaucetControllerEntity::class )->find( $id ) ) ) {
            abort(404);
        }

        /** @noinspection PhpUndefinedMethodInspection - need to sort D2EM::getRepository factory inspection */
        return view( 'faucet-controller/view' )->with([
            'fct'                => $fct
        ]);
    }

    /**
     * Delete a faucet_controllers
     *
     * @param  int    $id        faucet_controllers that need to be deleted
     * @return redirectresponse
     */
    public function delete( int $id ): RedirectResponse {
        /** @var FaucetControllerEntity $fct */
        if( !( $fct = D2EM::getRepository( FaucetControllerEntity::class )->find( $id ) ) ) {
            abort(404);
        }

        D2EM::remove($fct);
        D2EM::flush();

        AlertContainer::push( 'The controller has been successfully deleted.', Alert::SUCCESS );
        return Redirect::to( 'faucet-controller/list');
    }

}
