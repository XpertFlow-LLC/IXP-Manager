<?php

namespace Entities;

use Carbon\Carbon;
use DateTime;

/**
 * FaucetController
 */
class FaucetController
{    
    /**
     * @var integer
     */
    private $id;
    /**
     * @var string
     */
    private $handle;

    /**
     * @var string
     */
    private $controller_ip;

    /**
     * @var integer
     */
    private $controller_port;

    /**
     * @var string
     */
    private $api;

    /**
     * @var string
     */
    private $faucet_version;

    /**
     * @var string
     */
    private $faucet_config;

    /**
     * @var integer
     */
    private $faucet_config_stat_reload;

    /**
     * @var string
     */
    private $faucet_log;

    /**
     * @var string
     */
    private $faucet_exception_log;

    /**
     * @var string
     */
    private $faucet_event_sock;

    /**
     * @var integer
     */
    private $faucet_prometheus_port;

    /**
     * @var string
     */
    private $faucet_prometheus_addr;

    /**
     * @var string
     */
    private $faucet_pipeline_dir;

    /**
     * @var string
     */
    private $gauge_config;

    /**
     * @var integer
     */
    private $gauge_config_stat_reload;

    /**
     * @var string
     */
    private $gauge_log;

    /**
     * @var string
     */
    private $gauge_exception_log;

    /**
     * @var string
     */
    private $gauge_prometheus_addr;

    /**
     * @var int
     */
    private $gauge_prometheus_port;

    /**
     * @var \DateTime
     */
    private $last_updated;

    /**
     * @var \Entities\Vlan
     */
    private $vlan;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get handle
     *
     * @return string
     */
    public function getHandle()
    {
        return $this->handle;
    }

    /**
     * Get handle
     *
     * @return string
     */
    public function handle()
    {
        return $this->getHandle();
    }

    /**
     * Get vlan
     *
     * @return \Entities\Vlan
     */
    public function getVlan()
    {
        return $this->vlan;
    }

    /**
     * Get vlan ID
     *
     * @return int
     */
    public function vlanId()
    {
        return $this->getVlan()->getId();
    }


    /**
     * Get controller_ip
     *
     * @return string
     */
    public function getControllerIp()
    {
        return $this->controller_ip;
    }

    /**
     * Get controller_ip
     *
     * @return string
     */
    public function controllerIp()
    {
        return $this->getControllerIp();
    }


    /**
     * Get controller_port
     *
     * @return int
     */
    public function getControllerPort()
    {
        return $this->controller_port;
    }

    /**
     * Get controller_port
     *
     * @return int
     */
    public function controllerPort()
    {
        return $this->getControllerPort();
    }

    /**
     * Get api
     *
     * @return string
     */
    public function getApi()
    {
        return $this->api;
    }

    /**
     * Get api
     *
     * @return string
     */
    public function api()
    {
        return $this->getApi();
    }

    /**
     * Does the Controller have an API?
     *
     * In other words, is 'api' and 'api_type' set?
     * @return bool
     */
    public function hasApi(): bool {
        return $this->getApi() && $this->getApiType();
    }

    /**
     * Get faucet_version
     *
     * @return string
     */
    public function getFaucetVersion()
    {
        return $this->faucet_version;
    }

    /**
     * Get faucet_version
     *
     * @return string
     */
    public function faucetVersion()
    {
        return $this->getFaucetVersion();
    }

    /**
     * Get faucet_config
     *
     * @return string
     */
    public function getFaucetConfig()
    {
        return $this->faucet_config;
    }

    /**
     * Get faucet_config
     *
     * @return string
     */
    public function faucetConfig()
    {
        return $this->getFaucetConfig();
    }

    /**
     * Get faucet_config_stat_reload
     *
     * @return int
     */
    public function getFaucetConfigStatReload()
    {
        return $this->faucet_config_stat_reload;
    }

    /**
     * Get faucet_config_stat_reload
     *
     * @return int
     */
    public function faucetConfigStatReload()
    {
        return $this->getFaucetConfigStatReload();
    }

    /**
     * Get faucet_log
     *
     * @return string
     */
    public function getFaucetLog()
    {
        return $this->faucet_log;
    }

    /**
     * Get faucet_log
     *
     * @return string
     */
    public function faucetLog()
    {
        return $this->getFaucetLog();
    }

    /**
     * Get faucet_exception_log
     *
     * @return string
     */
    public function getFaucetExceptionLog()
    {
        return $this->faucet_exception_log;
    }

    /**
     * Get faucet_exception_log
     *
     * @return string
     */
    public function faucetExceptionLog()
    {
        return $this->getFaucetExceptionLog();
    }

    /**
     * Get faucet_event_sock
     *
     * @return string
     */
    public function getFaucetEventSock()
    {
        return $this->faucet_event_sock;
    }

    /**
     * Get faucet_event_sock
     *
     * @return string
     */
    public function faucetEventSock()
    {
        return $this->getFaucetEventSock();
    }

    /**
     * Get faucet_prometheus_port
     *
     * @return int
     */
    public function getFaucetPrometheusPort()
    {
        return $this->faucet_prometheus_port;
    }

    /**
     * Get faucet_prometheus_port
     *
     * @return int
     */
    public function faucetPrometheusPort()
    {
        return $this->getFaucetPrometheusPort();
    }

    /**
     * Get faucet_prometheus_addr
     *
     * @return string
     */
    public function getFaucetPrometheusAddr()
    {
        return $this->faucet_prometheus_addr;
    }

    /**
     * Get faucet_prometheus_addr
     *
     * @return string
     */
    public function faucetPrometheusAddr()
    {
        return $this->getFaucetPrometheusAddr();
    }

    /**
     * Get faucet_pipeline_dir
     *
     * @return string
     */
    public function getFaucetPipelineDir()
    {
        return $this->faucet_pipeline_dir;
    }

    /**
     * Get faucet_pipeline_dir
     *
     * @return string
     */
    public function faucetPipelineDir()
    {
        return $this->getFaucetPipelineDir();
    }

    /**
     * Get gauge_config
     *
     * @return string
     */
    public function getGaugeConfig()
    {
        return $this->gauge_config;
    }

    /**
     * Get gauge_config
     *
     * @return string
     */
    public function GaugeConfig()
    {
        return $this->getGaugeConfig();
    }

    /**
     * Get gauge_config_stat_reload
     *
     * @return int
     */
    public function getGaugeConfigStatReload()
    {
        return $this->gauge_config_stat_reload;
    }

    /**
     * Get gauge_config_stat_reload
     *
     * @return int
     */
    public function GaugeConfigStatReload()
    {
        return $this->getGaugeConfigStatReload();
    }

    /**
     * Get gauge_log
     *
     * @return string
     */
    public function getGaugeLog()
    {
        return $this->gauge_log;
    }

    /**
     * Get gauge_log
     *
     * @return string
     */
    public function GaugeLog()
    {
        return $this->getGaugeLog();
    }

    /**
     * Get gauge_exception_log
     *
     * @return string
     */
    public function getGaugeExceptionLog()
    {
        return $this->gauge_exception_log;
    }

    /**
     * Get gauge_exception_log
     *
     * @return string
     */
    public function GaugeExceptionLog()
    {
        return $this->getGaugeExceptionLog();
    }

    /**
     * Get gauge_prometheus_addr
     *
     * @return string
     */
    public function getGaugePrometheusAddr()
    {
        return $this->gauge_prometheus_addr;
    }

    /**
     * Get gauge_prometheus_addr
     *
     * @return string
     */
    public function GaugePrometheusAddr()
    {
        return $this->getGaugePrometheusAddr();
    }
    
    /**
     * Get gauge_prometheus_port
     *
     * @return int
     */
    public function getGaugePrometheusPort()
    {
        return $this->gauge_prometheus_port;
    }

    /**
     * Get gauge_prometheus_port
     *
     * @return int
     */
    public function GaugePrometheusPort()
    {
        return $this->getGaugePrometheusPort();
    }   
    /**
     * Get last updated
     *
     * @return DateTime|null
     */
    public function getLastUpdated() {
        return $this->last_updated;
    }

    /**
     * Get last updated as a Carbon object
     *
     * @return Carbon|null
     */
    public function getLastUpdatedCarbon() {
        return $this->last_updated ? Carbon::instance( $this->getLastUpdated() ) : null;
    }
    /**
     * Set handle
     *
     * @param string $handle
     *
     * @return FaucetController
     */
    public function setHandle($handle)
    {
        $this->handle = $handle;
        return $this;
    }

    /**
     * Set controller_ip
     *
     * @param string $controller_ip
     *
     * @return FaucetController
     */
    public function setControllerIp($controller_ip)
    {
        $this->controller_ip = $controller_ip;
        return $this;
    }

    /**
     * Set controller_port
     *
     * @param string $controller_port
     *
     * @return FaucetController
     */
    public function setControllerPort($controller_port)
    {
        $this->controller_port = $controller_port;
        return $this;
    }

    /**
     * Set api
     *
     * @param string $api
     *
     * @return FaucetController
     */
    public function setApi($api)
    {
        $this->api = $api;
        return $this;
    }

    /**
     * Set faucet_version
     *
     * @param string $faucet_version
     *
     * @return FaucetController
     */
    public function setFaucetVersion($faucet_version)
    {
        $this->faucet_version = $faucet_version;
        return $this;
    }

    /**
     * Set faucet_config
     *
     * @param string $faucet_config
     *
     * @return FaucetController
     */
    public function setFaucetConfig($faucet_config)
    {
        $this->faucet_config = $faucet_config;
        return $this;
    }

    /**
     * Set faucet_config_stat_reload
     *
     * @param int $faucet_config_stat_reload
     *
     * @return FaucetController
     */
    public function setFaucetConfigStatReload($faucet_config_stat_reload)
    {
        $this->faucet_config_stat_reload = $faucet_config_stat_reload;
        return $this;
    }

    /**
     * Set faucet_log
     *
     * @param string $faucet_log
     *
     * @return FaucetController
     */
    public function setFaucetLog($faucet_log)
    {
        $this->faucet_log = $faucet_log;
        return $this;
    }

    /**
     * Set faucet_exception_log
     *
     * @param string $faucet_exception_log
     *
     * @return FaucetController
     */
    public function setFaucetExceptionLog($faucet_exception_log)
    {
        $this->faucet_exception_log = $faucet_exception_log;
        return $this;
    }

    /**
     * Set faucet_event_sock
     *
     * @param string $faucet_event_sock
     *
     * @return FaucetController
     */
    public function setFaucetEventSock($faucet_event_sock)
    {
        $this->faucet_event_sock = $faucet_event_sock;
        return $this;
    }

    
    /**
     * Set faucet_prometheus_port
     *
     * @param int $faucet_prometheus_port
     *
     * @return FaucetController
     */
    public function setFaucetPrometheusPort($faucet_prometheus_port)
    {
        $this->faucet_prometheus_port = $faucet_prometheus_port;
        return $this;
    }

    /**
     * Set faucet_prometheus_addr
     *
     * @param string $faucet_prometheus_addr
     *
     * @return FaucetController
     */
    public function setFaucetPrometheusAddr($faucet_prometheus_addr)
    {
        $this->faucet_prometheus_addr = $faucet_prometheus_addr;
        return $this;
    }

    /**
     * Set faucet_pipeline_dir
     *
     * @param string $faucet_pipeline_dir
     *
     * @return FaucetController
     */
    public function setFaucetPipelineDir($faucet_pipeline_dir)
    {
        $this->faucet_pipeline_dir = $faucet_pipeline_dir;
        return $this;
    }

    /**
     * Set gauge_config
     *
     * @param string $gauge_config
     *
     * @return FaucetController
     */
    public function setGaugeConfig($gauge_config)
    {
        $this->gauge_config = $gauge_config;
        return $this;
    }


    /**
     * Set gauge_config_stat_reload
     *
     * @param int $gauge_config_stat_reload
     *
     * @return FaucetController
     */
    public function setGaugeConfigStatReload($gauge_config_stat_reload)
    {
        $this->gauge_config_stat_reload = $gauge_config_stat_reload;
        return $this;
    }


    /**
     * Set gauge_log
     *
     * @param string $gauge_log
     *
     * @return FaucetController
     */
    public function setGaugeLog($gauge_log)
    {
        $this->gauge_log = $gauge_log;
        return $this;
    }

    /**
     * Set gauge_exception_log
     *
     * @param string $gauge_exception_log
     *
     * @return FaucetController
     */
    public function setGaugeExceptionLog($gauge_exception_log)
    {
        $this->gauge_exception_log = $gauge_exception_log;
        return $this;
    }

    /**
     * Set gauge_prometheus_addr
     *
     * @param string $gauge_prometheus_addr
     *
     * @return FaucetController
     */
    public function setGaugePrometheusAddr($gauge_prometheus_addr)
    {
        $this->gauge_prometheus_addr = $gauge_prometheus_addr;
        return $this;
    }

    /**
     * Set gauge_prometheus_port
     *
     * @param int $gauge_prometheus_port
     *
     * @return FaucetController
     */
    public function setGaugePrometheusPort($gauge_prometheus_port)
    {
        $this->gauge_prometheus_port = $gauge_prometheus_port;
        return $this;
    }    

    /**
     * Set last updated
     *
     * @param DateTime $date
     * @return FaucetController
     */
    public function setLastUpdated( DateTime $date ): FaucetController {
        $this->last_updated = $date;
        return $this;
    }

    /**
     * Set vlan
     *
     * @param \Entities\Vlan $vlan
     *
     * @return FaucetController
     */
    public function setVlan(Vlan $vlan)
    {
        $this->vlan = $vlan;
        return $this;
    }

    /**
     * This function check is the last updated time is greater than the given number of seconds
     *
     * @return bool
     */
    public function lastUpdatedGreaterThanSeconds( int $threshold ) {
        if( !$this->getLastUpdated() ) {
            // if null, then, as far as we know, it has never been updated....
            return true;
        }

        return $this->getLastUpdatedCarbon()->diffInSeconds( null ) > $threshold;
    }
}
