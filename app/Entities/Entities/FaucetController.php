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
     * Is the type API_TYPE_NONE?
     *
     * @return bool
     */
    public function isApiNone(): bool {
        return $this->getApiType() === self::API_TYPE_NONE;
    }

    /**
     * Set handle
     *
     * @param string $handle
     *
     * @return Controller
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
     * @return Controller
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
     * @return Controller
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
     * @return Controller
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
     * @return Controller
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
     * @return Controller
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
     * @return Controller
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
     * @return Controller
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
     * @return Controller
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
     * @return Controller
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
     * @return Controller
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
     * @return Controller
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
     * @return Controller
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
     * @return Controller
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
     * @return Controller
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
     * @return Controller
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
     * @return Controller
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
     * @return Controller
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
     * @return Controller
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
     * @return Controller
     */
    public function setLastUpdated( DateTime $date ): Controller {
        $this->last_updated = $date;
        return $this;
    }

    /**
     * Set vlan
     *
     * @param \Entities\Vlan $vlan
     *
     * @return Router
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
