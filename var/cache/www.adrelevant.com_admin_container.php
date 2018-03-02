<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * ReviveAdserverCachedContainer.
 *
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final since Symfony 3.3
 */
class ReviveAdserverCachedContainer extends Container
{
    private $parameters;
    private $targetDirs = array();

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->parameters = $this->getDefaultParameters();

        $this->services = array();
        $this->methodMap = array(
            'filesystem' => 'getFilesystemService',
            'filesystem.adapter.ftp' => 'getFilesystem_Adapter_FtpService',
            'filesystem.adapter.local' => 'getFilesystem_Adapter_LocalService',
            'html5.parser.adobe_edge' => 'getHtml5_Parser_AdobeEdgeService',
            'html5.parser.meta' => 'getHtml5_Parser_MetaService',
            'html5.zip.manager' => 'getHtml5_Zip_ManagerService',
        );

        $this->aliases = array();
    }

    /**
     * {@inheritdoc}
     */
    public function compile()
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    /**
     * {@inheritdoc}
     */
    public function isCompiled()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isFrozen()
    {
        @trigger_error(sprintf('The %s() method is deprecated since version 3.3 and will be removed in 4.0. Use the isCompiled() method instead.', __METHOD__), E_USER_DEPRECATED);

        return true;
    }

    /**
     * Gets the public 'filesystem' shared service.
     *
     * @return \League\Flysystem\Filesystem
     */
    protected function getFilesystemService()
    {
        return $this->services['filesystem'] = new \League\Flysystem\Filesystem(${($_ = isset($this->services['filesystem.adapter.local']) ? $this->services['filesystem.adapter.local'] : $this->get('filesystem.adapter.local')) && false ?: '_'});
    }

    /**
     * Gets the public 'filesystem.adapter.ftp' shared service.
     *
     * @return \League\Flysystem\Adapter\Ftp
     */
    protected function getFilesystem_Adapter_FtpService()
    {
        return $this->services['filesystem.adapter.ftp'] = new \League\Flysystem\Adapter\Ftp(array('host' => '', 'username' => '', 'password' => '', 'root' => '', 'passive' => ''));
    }

    /**
     * Gets the public 'filesystem.adapter.local' shared service.
     *
     * @return \League\Flysystem\Adapter\Local
     */
    protected function getFilesystem_Adapter_LocalService()
    {
        return $this->services['filesystem.adapter.local'] = new \League\Flysystem\Adapter\Local('/var/www/html/www/images', 0);
    }

    /**
     * Gets the public 'html5.parser.adobe_edge' shared service.
     *
     * @return \RV\Parser\Html5\AdobeEdgeParser
     */
    protected function getHtml5_Parser_AdobeEdgeService()
    {
        return $this->services['html5.parser.adobe_edge'] = new \RV\Parser\Html5\AdobeEdgeParser();
    }

    /**
     * Gets the public 'html5.parser.meta' shared service.
     *
     * @return \RV\Parser\Html5\MetaParser
     */
    protected function getHtml5_Parser_MetaService()
    {
        return $this->services['html5.parser.meta'] = new \RV\Parser\Html5\MetaParser();
    }

    /**
     * Gets the public 'html5.zip.manager' shared service.
     *
     * @return \RV\Manager\Html5ZipManager
     */
    protected function getHtml5_Zip_ManagerService()
    {
        $this->services['html5.zip.manager'] = $instance = new \RV\Manager\Html5ZipManager(${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : $this->get('filesystem')) && false ?: '_'});

        $instance->addParser(${($_ = isset($this->services['html5.parser.meta']) ? $this->services['html5.parser.meta'] : $this->get('html5.parser.meta')) && false ?: '_'}, 0);
        $instance->addParser(${($_ = isset($this->services['html5.parser.adobe_edge']) ? $this->services['html5.parser.adobe_edge'] : $this->get('html5.parser.adobe_edge')) && false ?: '_'}, 5);

        return $instance;
    }

    /**
     * {@inheritdoc}
     */
    public function getParameter($name)
    {
        $name = strtolower($name);

        if (!(isset($this->parameters[$name]) || array_key_exists($name, $this->parameters) || isset($this->loadedDynamicParameters[$name]))) {
            throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
        }
        if (isset($this->loadedDynamicParameters[$name])) {
            return $this->loadedDynamicParameters[$name] ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
        }

        return $this->parameters[$name];
    }

    /**
     * {@inheritdoc}
     */
    public function hasParameter($name)
    {
        $name = strtolower($name);

        return isset($this->parameters[$name]) || array_key_exists($name, $this->parameters) || isset($this->loadedDynamicParameters[$name]);
    }

    /**
     * {@inheritdoc}
     */
    public function setParameter($name, $value)
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    /**
     * {@inheritdoc}
     */
    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $parameters = $this->parameters;
            foreach ($this->loadedDynamicParameters as $name => $loaded) {
                $parameters[$name] = $loaded ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
            }
            $this->parameterBag = new FrozenParameterBag($parameters);
        }

        return $this->parameterBag;
    }

    private $loadedDynamicParameters = array();
    private $dynamicParameters = array();

    /**
     * Computes a dynamic parameter.
     *
     * @param string The name of the dynamic parameter to load
     *
     * @return mixed The value of the dynamic parameter
     *
     * @throws InvalidArgumentException When the dynamic parameter does not exist
     */
    private function getDynamicParameter($name)
    {
        throw new InvalidArgumentException(sprintf('The dynamic parameter "%s" must be defined.', $name));
    }

    /**
     * Gets the default parameters.
     *
     * @return array An array of the default parameters
     */
    protected function getDefaultParameters()
    {
        return array(
            'openads.installed' => '1',
            'openads.requiressl' => '',
            'openads.sslport' => '443',
            'ui.enabled' => '1',
            'ui.applicationname' => '',
            'ui.headerfilepath' => '',
            'ui.footerfilepath' => '',
            'ui.logofilepath' => '',
            'ui.headerforegroundcolor' => '',
            'ui.headerbackgroundcolor' => '',
            'ui.headeractivetabcolor' => '',
            'ui.headertextcolor' => '',
            'ui.gzipcompression' => '1',
            'ui.supportlink' => '',
            'ui.combineassets' => '1',
            'ui.dashboardenabled' => '1',
            'ui.hidenavigator' => '',
            'ui.zonelinkingstatistics' => '1',
            'ui.disabledirectselection' => '1',
            'database.type' => 'mysql',
            'database.host' => 'mysql',
            'database.socket' => '/var/run/mysqld/mysqld.sock',
            'database.port' => '3306',
            'database.username' => 'root',
            'database.password' => 'Haveonme111',
            'database.name' => 'revive',
            'database.persistent' => '',
            'database.mysql4_compatibility' => '1',
            'database.protocol' => 'tcp',
            'database.compress' => '',
            'database.ssl' => '',
            'database.capath' => '',
            'database.ca' => '',
            'databasecharset.checkcomplete' => '1',
            'databasecharset.clientcharset' => 'latin1',
            'databasemysql.statisticssortbuffersize' => '',
            'databasepgsql.schema' => '',
            'webpath.admin' => 'www.adrelevant.com/www/admin',
            'webpath.delivery' => 'www.adrelevant.com/www/delivery',
            'webpath.deliveryssl' => 'www.adrelevant.com/www/delivery',
            'webpath.images' => 'www.adrelevant.com/www/images',
            'webpath.imagesssl' => 'www.adrelevant.com/www/images',
            'file.asyncjs' => 'asyncjs.php',
            'file.asyncjsjs' => 'async.js',
            'file.asyncspc' => 'asyncspc.php',
            'file.click' => 'ck.php',
            'file.conversionvars' => 'tv.php',
            'file.content' => 'ac.php',
            'file.conversion' => 'ti.php',
            'file.conversionjs' => 'tjs.php',
            'file.flash' => 'fl.js',
            'file.google' => 'ag.php',
            'file.frame' => 'afr.php',
            'file.image' => 'ai.php',
            'file.js' => 'ajs.php',
            'file.layer' => 'al.php',
            'file.log' => 'lg.php',
            'file.popup' => 'apu.php',
            'file.view' => 'avw.php',
            'file.xmlrpc' => 'axmlrpc.php',
            'file.local' => 'alocal.php',
            'file.frontcontroller' => 'fc.php',
            'file.singlepagecall' => 'spc.php',
            'file.spcjs' => 'spcjs.php',
            'file.xmlrest' => 'ax.php',
            'store.mode' => '0',
            'store.webdir' => '/var/www/html/www/images',
            'store.ftphost' => '',
            'store.ftppath' => '',
            'store.ftpusername' => '',
            'store.ftppassword' => '',
            'store.ftppassive' => '',
            'origin.type' => '',
            'origin.host' => '',
            'origin.port' => '80',
            'origin.script' => '/www/delivery/dxmlrpc.php',
            'origin.timeout' => '10',
            'origin.protocol' => 'http',
            'allowedbanners.sql' => '1',
            'allowedbanners.web' => '1',
            'allowedbanners.url' => '1',
            'allowedbanners.html' => '1',
            'allowedbanners.text' => '1',
            'allowedbanners.video' => '1',
            'delivery.cacheexpire' => '1200',
            'delivery.cachestoreplugin' => 'deliveryCacheStore:oxCacheFile:oxCacheFile',
            'delivery.cachepath' => '',
            'delivery.acls' => '1',
            'delivery.aclsdirectselection' => '1',
            'delivery.obfuscate' => '',
            'delivery.execphp' => '',
            'delivery.ctdelimiter' => '__',
            'delivery.chdelimiter' => ',',
            'delivery.keywords' => '',
            'delivery.cgiforcestatusheader' => '',
            'delivery.clicktracking' => '',
            'delivery.ecpmselectionrate' => '0.9',
            'delivery.enablecontrolonpurecpm' => '1',
            'delivery.assetclientcacheexpire' => '3600',
            'defaultbanner.imageurl' => '',
            'p3p.policies' => '1',
            'p3p.compactpolicy' => 'CUR ADM OUR NOR STA NID',
            'p3p.policylocation' => '',
            'graphs.ttfdirectory' => '',
            'graphs.ttfname' => '',
            'logging.adrequests' => '',
            'logging.adimpressions' => '1',
            'logging.adclicks' => '1',
            'logging.trackerimpressions' => '1',
            'logging.reverselookup' => '',
            'logging.proxylookup' => '1',
            'logging.defaultimpressionconnectionwindow' => '',
            'logging.defaultclickconnectionwindow' => '',
            'logging.ignorehosts' => '',
            'logging.ignoreuseragents' => '',
            'logging.enforceuseragents' => '',
            'logging.blockadclickswindow' => '0',
            'logging.blockinactivebanners' => '1',
            'maintenance.automaintenance' => '1',
            'maintenance.timelimitscripts' => '1800',
            'maintenance.operationinterval' => '60',
            'maintenance.blockadimpressions' => '0',
            'maintenance.blockadclicks' => '0',
            'maintenance.channelforecasting' => '',
            'maintenance.prunecompletedcampaignssummarydata' => '',
            'maintenance.prunedatatables' => '1',
            'maintenance.ecpmcampaignlevels' => '9|8|7|6',
            'priority.instantupdate' => '1',
            'priority.intentionaloverdelivery' => '0',
            'priority.defaultclickratio' => '0.005',
            'priority.defaultconversionratio' => '0.0001',
            'priority.randmax' => '2147483647',
            'performancestatistics.defaultimpressionsthreshold' => '10000',
            'performancestatistics.defaultdaysintervalthreshold' => '30',
            'table.prefix' => 'rv_',
            'table.type' => 'INNODB',
            'table.account_preference_assoc' => 'account_preference_assoc',
            'table.account_user_assoc' => 'account_user_assoc',
            'table.account_user_permission_assoc' => 'account_user_permission_assoc',
            'table.accounts' => 'accounts',
            'table.acls' => 'acls',
            'table.acls_channel' => 'acls_channel',
            'table.ad_category_assoc' => 'ad_category_assoc',
            'table.ad_zone_assoc' => 'ad_zone_assoc',
            'table.affiliates' => 'affiliates',
            'table.affiliates_extra' => 'affiliates_extra',
            'table.agency' => 'agency',
            'table.application_variable' => 'application_variable',
            'table.audit' => 'audit',
            'table.banners' => 'banners',
            'table.campaigns' => 'campaigns',
            'table.campaigns_trackers' => 'campaigns_trackers',
            'table.category' => 'category',
            'table.channel' => 'channel',
            'table.clients' => 'clients',
            'table.data_intermediate_ad' => 'data_intermediate_ad',
            'table.data_intermediate_ad_connection' => 'data_intermediate_ad_connection',
            'table.data_intermediate_ad_variable_value' => 'data_intermediate_ad_variable_value',
            'table.data_raw_ad_click' => 'data_raw_ad_click',
            'table.data_raw_ad_impression' => 'data_raw_ad_impression',
            'table.data_raw_ad_request' => 'data_raw_ad_request',
            'table.data_raw_tracker_impression' => 'data_raw_tracker_impression',
            'table.data_raw_tracker_variable_value' => 'data_raw_tracker_variable_value',
            'table.data_summary_ad_hourly' => 'data_summary_ad_hourly',
            'table.data_summary_ad_zone_assoc' => 'data_summary_ad_zone_assoc',
            'table.data_summary_channel_daily' => 'data_summary_channel_daily',
            'table.data_summary_zone_impression_history' => 'data_summary_zone_impression_history',
            'table.images' => 'images',
            'table.log_maintenance_forecasting' => 'log_maintenance_forecasting',
            'table.log_maintenance_priority' => 'log_maintenance_priority',
            'table.log_maintenance_statistics' => 'log_maintenance_statistics',
            'table.password_recovery' => 'password_recovery',
            'table.placement_zone_assoc' => 'placement_zone_assoc',
            'table.preferences' => 'preferences',
            'table.session' => 'session',
            'table.targetstats' => 'targetstats',
            'table.trackers' => 'trackers',
            'table.tracker_append' => 'tracker_append',
            'table.userlog' => 'userlog',
            'table.users' => 'users',
            'table.variables' => 'variables',
            'table.variable_publisher' => 'variable_publisher',
            'table.zones' => 'zones',
            'email.logoutgoing' => '1',
            'email.headers' => '',
            'email.qmailpatch' => '',
            'email.fromname' => '',
            'email.fromaddress' => 'gary_guo@hotmail.com',
            'email.fromcompany' => '',
            'email.usemanagerdetails' => '',
            'log.enabled' => '1',
            'log.methodnames' => '',
            'log.linenumbers' => '',
            'log.type' => 'file',
            'log.name' => 'debug.log',
            'log.priority' => '6',
            'log.ident' => 'OX',
            'log.paramsusername' => '',
            'log.paramspassword' => '',
            'log.filemode' => '0644',
            'deliverylog.enabled' => '',
            'deliverylog.name' => 'delivery.log',
            'deliverylog.filemode' => '0644',
            'deliverylog.priority' => '6',
            'cookie.permcookieseconds' => '31536000',
            'cookie.maxcookiesize' => '2048',
            'cookie.domain' => '',
            'cookie.vieweriddomain' => '',
            'debug.logfile' => '',
            'debug.production' => '1',
            'debug.senderroremails' => '',
            'debug.emailsubject' => 'Error from Revive Adserver',
            'debug.email' => 'email@example.com',
            'debug.emailadminthreshold' => '3',
            'debug.erroroverride' => '1',
            'debug.showbacktrace' => '',
            'debug.disablesendemails' => '',
            'var.prefix' => 'OA_',
            'var.cookietest' => 'ct',
            'var.cachebuster' => 'cb',
            'var.channel' => 'source',
            'var.dest' => 'oadest',
            'var.logclick' => 'log',
            'var.n' => 'n',
            'var.params' => 'oaparams',
            'var.viewerid' => 'OAID',
            'var.viewergeo' => 'OAGEO',
            'var.campaignid' => 'campaignid',
            'var.adid' => 'bannerid',
            'var.creativeid' => 'cid',
            'var.zoneid' => 'zoneid',
            'var.blockad' => 'OABLOCK',
            'var.capad' => 'OACAP',
            'var.sessioncapad' => 'OASCAP',
            'var.blockcampaign' => 'OACBLOCK',
            'var.capcampaign' => 'OACCAP',
            'var.sessioncapcampaign' => 'OASCCAP',
            'var.blockzone' => 'OAZBLOCK',
            'var.capzone' => 'OAZCAP',
            'var.sessioncapzone' => 'OASZCAP',
            'var.vars' => 'OAVARS',
            'var.trackonly' => 'trackonly',
            'var.openads' => 'openads',
            'var.lastview' => 'OXLIA',
            'var.lastclick' => 'OXLCA',
            'var.blockloggingclick' => 'OXBLC',
            'var.fallback' => 'oxfb',
            'var.trace' => 'OXTR',
            'var.product' => 'revive',
            'lb.enabled' => '',
            'lb.type' => 'mysql',
            'lb.host' => 'localhost',
            'lb.port' => '3306',
            'lb.username' => '',
            'lb.password' => '',
            'lb.name' => '',
            'lb.persistent' => '',
            'sync.checkforupdates' => '1',
            'sync.sharestack' => '1',
            'oacsync.protocol' => 'https',
            'oacsync.host' => 'sync.revive-adserver.com',
            'oacsync.path' => '/xmlrpc.php',
            'oacsync.httpport' => '80',
            'oacsync.httpsport' => '443',
            'authentication.type' => 'internal',
            'authentication.deleteunverifiedusersafter' => '2419200',
            'geotargeting.type' => '',
            'geotargeting.showunavailable' => '',
            'pluginpaths.packages' => '/plugins/etc/',
            'pluginpaths.plugins' => '/plugins/',
            'pluginpaths.admin' => '/www/admin/plugins/',
            'pluginpaths.var' => '/var/plugins/',
            'pluginsettings.enableoninstall' => '1',
            'pluginsettings.usemergedfunctions' => '1',
            'plugins.openxbannertypes' => '1',
            'plugins.openxdeliverylimitations' => '1',
            'plugins.openx3rdpartyservers' => '1',
            'plugins.openxreports' => '1',
            'plugins.openxdeliverycachestore' => '1',
            'plugins.openxmaxmindgeoip' => '1',
            'plugins.openxinvocationtags' => '1',
            'plugins.openxdeliverylog' => '1',
            'plugins.openxvideoads' => '1',
            'plugingroupcomponents.oxhtml' => '1',
            'plugingroupcomponents.oxtext' => '1',
            'plugingroupcomponents.client' => '1',
            'plugingroupcomponents.geo' => '1',
            'plugingroupcomponents.site' => '1',
            'plugingroupcomponents.time' => '1',
            'plugingroupcomponents.ox3rdpartyservers' => '1',
            'plugingroupcomponents.oxreportsstandard' => '1',
            'plugingroupcomponents.oxreportsadmin' => '1',
            'plugingroupcomponents.oxcachefile' => '1',
            'plugingroupcomponents.oxmemcached' => '1',
            'plugingroupcomponents.oxmaxmindgeoip' => '1',
            'plugingroupcomponents.oxinvocationtags' => '1',
            'plugingroupcomponents.oxdeliverydataprepare' => '1',
            'plugingroupcomponents.oxlogclick' => '1',
            'plugingroupcomponents.oxlogconversion' => '1',
            'plugingroupcomponents.oxlogimpression' => '1',
            'plugingroupcomponents.oxlogrequest' => '1',
            'plugingroupcomponents.vastinlinebannertypehtml' => '1',
            'plugingroupcomponents.vastoverlaybannertypehtml' => '1',
            'plugingroupcomponents.oxlogvast' => '1',
            'plugingroupcomponents.vastservevideoplayer' => '1',
            'plugingroupcomponents.videoreport' => '1',
            'audit.enabled' => '1',
            'audit.enabledforzonelinking' => '',
            'client.sniff' => '1',
            'deliveryhooks.postinit' => 'deliveryLimitations:Client:initClientData',
            'deliveryhooks.cachestore' => 'deliveryCacheStore:oxCacheFile:oxCacheFile|deliveryCacheStore:oxMemcached:oxMemcached',
            'deliveryhooks.cacheretrieve' => 'deliveryCacheStore:oxCacheFile:oxCacheFile|deliveryCacheStore:oxMemcached:oxMemcached',
            'deliveryhooks.prelog' => 'deliveryDataPrepare:oxDeliveryDataPrepare:dataCommon|deliveryDataPrepare:oxDeliveryDataPrepare:dataPageInfo|deliveryDataPrepare:oxDeliveryDataPrepare:dataUserAgent',
            'deliveryhooks.logclick' => 'deliveryDataPrepare:oxDeliveryDataPrepare:dataCommon|deliveryLog:oxLogClick:logClick',
            'deliveryhooks.logconversion' => 'deliveryLog:oxLogConversion:logConversion',
            'deliveryhooks.logconversionvariable' => 'deliveryLog:oxLogConversion:logConversionVariable',
            'deliveryhooks.logimpression' => 'deliveryDataPrepare:oxDeliveryDataPrepare:dataCommon|deliveryLog:oxLogImpression:logImpression',
            'deliveryhooks.logrequest' => 'deliveryDataPrepare:oxDeliveryDataPrepare:dataCommon|deliveryLog:oxLogRequest:logRequest',
            'deliveryhooks.logimpressionvast' => 'deliveryLog:oxLogVast:logImpressionVast',
            'oxcachefile.cachepath' => '',
            'oxmemcached.memcachedservers' => '',
            'oxmemcached.memcachedexpiretime' => '',
            'oxmaxmindgeoip.geoipcountrylocation' => '',
            'oxmaxmindgeoip.geoipregionlocation' => '',
            'oxmaxmindgeoip.geoipcitylocation' => '',
            'oxmaxmindgeoip.geoiparealocation' => '',
            'oxmaxmindgeoip.geoipdmalocation' => '',
            'oxmaxmindgeoip.geoiporglocation' => '',
            'oxmaxmindgeoip.geoipisplocation' => '',
            'oxmaxmindgeoip.geoipnetspeedlocation' => '',
            'oxinvocationtags.isallowedasync' => '1',
            'oxinvocationtags.isallowedadjs' => '1',
            'oxinvocationtags.isallowedadframe' => '1',
            'oxinvocationtags.isallowedadlayer' => '1',
            'oxinvocationtags.isallowedadview' => '0',
            'oxinvocationtags.isallowedadviewnocookies' => '1',
            'oxinvocationtags.isallowedlocal' => '1',
            'oxinvocationtags.isallowedpopup' => '0',
            'oxinvocationtags.isallowedxmlrpc' => '0',
            'vastoverlaybannertypehtml.isvastoverlayastextenabled' => '1',
            'vastoverlaybannertypehtml.isvastoverlayasswfenabled' => '1',
            'vastoverlaybannertypehtml.isvastoverlayasimageenabled' => '1',
            'vastoverlaybannertypehtml.isvastoverlayashtmlenabled' => '1',
            'vastservevideoplayer.isautoplayofvideoinopenxadmintoolenabled' => '0',
        );
    }
}
