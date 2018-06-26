<?php
/** @var Foil\Template\Template $t */

$this->layout( 'layouts/ixpv4' )
?>
<?php $this->section( 'title' ) ?>
    <a href="<?= action( 'SDNController@list' )?>">Faucet Controller</a>
<?php $this->append() ?>

<?php $this->section( 'page-header-postamble' ) ?>
    <li><?= $t->ee( $t->fct->getHandle() ) ?></li>
<?php $this->append() ?>

<?php $this->section( 'page-header-preamble' ) ?>
    <li class="pull-right">
        <div class="btn-group btn-group-xs" role="group">
            <a type="button" class="btn btn-default" href="<?= route('faucet-controller/list' ) ?>" title="list">
                <span class="glyphicon glyphicon-th-list"></span>
            </a>
            <a type="button" class="btn btn-default" href="<?= route ('faucet-controller/add' ) ?>" title="add">
                <span class="glyphicon glyphicon-plus"></span>
            </a>
            <a type="button" class="btn btn-default" href="<?= route ('faucet-controller/edit' , [ 'id' => $t->fct->getId() ] ) ?>" title="edit">
                <span class="glyphicon glyphicon-pencil"></span>
            </a>

        </div>
    </li>
<?php $this->append() ?>

<?php $this->section( 'content' ) ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            Faucet Controller Details
        </div>
        <div class="panel-body">
            <div class="col-xs-6">
                <table class="table_view_info">
                    <tr>
                        <td>
                            <b>
                                Handle:
                            </b>
                        </td>
                        <td>
                            <?= $t->ee( $t->fct->getHandle() )?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>
                                Vlan:
                            </b>
                        </td>
                        <td>
                            <a href="<?= url( '/vlan/view/id/' ).'/'.$t->fct->getVlan()->getId()?> ">
                                <?= $t->ee( $t->fct->getVlan()->getName() )?>
                            </a>
                        </td>
                    </tr>
 
                    <tr>
                        <td>
                            <b>
                                Controller IP:
                            </b>
                        </td>
                        <td>
                            <?= $t->ee( $t->fct->getControllerIp() ) ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>
                                Controller Port:
                            </b>
                        </td>
                        <td>
                            <?= $t->ee( $t->fct->getControllerPort() ) ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>
                                API:
                            </b>
                        </td>
                        <td>
                            <a href="<?= $t->fct->getApi()?>">
                                <?= $t->ee( $t->fct->getApi() )?>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>
                                Faucet Version:
                            </b>
                        </td>
                        <td>
                            <?= $t->fct->getFaucetVersion() ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>
                                Faucet Config:
                            </b>
                        </td>
                        <td>
                            <?= $t->ee( $t->fct->getFaucetConfig() ) ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>
                                Faucet Config Stat Reload:
                            </b>
                        </td>
                        <td>
                            <?= $t->fct->getFaucetConfigStatReload() ? 'Yes' : 'No' ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>
                                Faucet Log:
                            </b>
                        </td>
                        <td>
                            <?= $t->fct->getFaucetLog() ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>
                                Faucet Exception Log:
                            </b>
                        </td>
                        <td>
                            <?= $t->ee( $t->fct->getFaucetExceptionLog() ) ?>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-xs-6">
                <table class="table_view_info">
                    <tr>
                        <td>
                            <b>
                                Faucet Event Sock:
                            </b>
                        </td>
                        <td>
                            <?= $t->fct->getFaucetEventSock() ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>
                                Faucet Prometheus Port:
                            </b>
                        </td>
                        <td>
                            <?= $t->fct->getFaucetPrometheusPort() ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>
                                Faucet Prometheus Addr:
                            </b>
                        </td>
                        <td>
                            <?= $t->fct->getFaucetPrometheusAddr() ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>
                                Faucet Pipeline Dir:
                            </b>
                        </td>
                        <td>
                            <?= $t->fct->getFaucetPipelineDir() ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>
                                Gauge Config:
                            </b>
                        </td>
                        <td>
                            <?= $t->fct->getGaugeConfig() ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>
                                Gauge Config Stat Reload:
                            </b>
                        </td>
                        <td>
                            <?= $t->fct->getGaugeConfigStatReload() ? 'Yes' : 'No' ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>
                                Gauge Log:
                            </b>
                        </td>
                        <td>
                            <?= $t->fct->getGaugeLog() ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>
                                Gauge Exception Log:
                            </b>
                        </td>
                        <td>
                            <?= $t->fct->getGaugeExceptionLog() ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>
                                Gauge Prometheus Addr:
                            </b>
                        </td>
                        <td>
                            <?= $t->fct->getGaugePrometheusAddr() ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>
                                Gauge Prometheus Port:
                            </b>
                        </td>
                        <td>
                            <?= $t->fct->getGaugePrometheusPort() ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>
                                Last Update:
                            </b>
                        </td>
                        <td>
                            <?= $t->fct->getLastUpdated() ? $t->fct->getLastUpdated()->format('Y-m-d H:i:s') : '(unknown)' ?>
                            <?php if( $t->fct->getLastUpdated() && $t->fct->lastUpdatedGreaterThanSeconds( 86400 ) ): ?>
                                <span class="label label-danger"><i class="glyphicon glyphicon-exclamation-sign" title="Last updated more than 1 day ago"></i></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<?php $this->append() ?>

<?php $this->section('scripts') ?>

<?php $this->append() ?>