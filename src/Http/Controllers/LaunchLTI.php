<?php
/**
 * Created by PhpStorm.
 * User: jharing10
 * Date: 2017/02/13
 * Time: 1:39 PM
 */

namespace EONConsulting\LaravelLTI\Http\Controllers;

require_once "config.php";

use Tsugi\Config\ConfigInfo;
use Tsugi\Core\LTIX;
use Tsugi\Util\LTI;

class LaunchLTI {

    static public function launchll() {
        $launch_url = 'https://www.edueto.com/lti';
        $key = '693c299c5978d4e583fe8053630aded3';
        $secret = '1039d57b324a98030918fd6389b6c614';

        $tool_consumer_instance_guid = 'lmsng.school.edu';
        $tool_consumer_instance_description = 'University of School (LMSng)';

        $params = [
            'lti_message_type' => 'basic-lti-launch-request',
            'lti_version' => '2.0',
            'resource_link_id' => '12345',
            'resource_link_title' => 'Title for thing',
            'resource_link_description' => 'desc',
            'user_id' => 1235134,
            'user_image' => '',
            'roles' => 'Instructor',
            'lis_person_name_given' => 'Josh',
            'lis_person_name_family' => 'Harington',
            'lis_person_name_full' => 'Josh Harington',
            'lis_person_contact_email_primary' => 'josh1@live.co.za',
            'context_id' => '1',
            'context_type' => 'CourseSection',
            'context_title' => 'Design of Personal Environments',
            'context_label' => 'SI182',
            'launch_presentation_locale' => 'en-US',
            'launch_presentation_document_target' => 'iframe',
            'launch_presentation_width' => 320,
            'launch_presentation_height' => 240,
            'launch_presentation_return_url' => 'http://lmsng.school.edu/portal/123/page/988/',
            'tool_consumer_instance_guid' => $tool_consumer_instance_guid,
            'tool_consumer_instance_name' => 'SchoolU',
            'tool_consumer_instance_description' => $tool_consumer_instance_description,
            'tool_consumer_instance_url' => 'http://lmsng.school.edu',
            'tool_consumer_instance_contact_email' => 'System.Admin@school.edu'
        ];

//        $endpoint = str_replace("dev.php",$_POST['custom_assn'],$launch_url);
        $endpoint = $launch_url;
        $endpoint = ConfigInfo::removeRelativePath($endpoint);

        $parms = LTI::signParameters($params, $endpoint, "POST", $key, $secret,
            "Finish Launch", $tool_consumer_instance_guid, $tool_consumer_instance_description);

        $content = LTI::postLaunchHTML($parms, $endpoint, isset($_POST['debug']),
            "width=\"100%\" height=\"900\" scrolling=\"auto\" frameborder=\"1\" transparency");
        print($content);
    }

    static public function launch($launch_url = '', $key = '', $secret = '') {
//        $launch_url = 'https://dev.unisaonline.net/tao/ltiDeliveryProvider/DeliveryTool/launch/eyJkZWxpdmVyeSI6Imh0dHA6XC9cL3VuaXNhdGVzdDIuY2xvdWRhcHAubmV0XC90YW9cL3VuaXNhLnJkZiNpMTQ1OTIzNjc0OTc4MjcyNzk0In0=';
//        $key = 'unisa';
//        $secret = '12345';

        $tool_consumer_instance_guid = 'lmsng.school.edu';
        $tool_consumer_instance_description = 'University of School (LMSng)';

        $params = [
            'lti_message_type' => 'basic-lti-launch-request',
            'lti_version' => '2.0',
            'resource_link_id' => '12345',
            'resource_link_title' => 'Title for thing',
            'resource_link_description' => 'desc',
            'user_id' => 1235134,
            'user_image' => '',
            'roles' => 'Instructor',
            'lis_person_name_given' => 'Josh',
            'lis_person_name_family' => 'Harington',
            'lis_person_name_full' => 'Josh Harington',
            'lis_person_contact_email_primary' => 'josh1@live.co.za',
            'context_id' => '1',
            'context_type' => 'CourseSection',
            'context_title' => 'Design of Personal Environments',
            'context_label' => 'SI182',
            'launch_presentation_locale' => 'en-US',
            'launch_presentation_document_target' => 'iframe',
            'launch_presentation_width' => 320,
            'launch_presentation_height' => 240,
            'launch_presentation_return_url' => $launch_url,
            'tool_consumer_instance_guid' => $tool_consumer_instance_guid,
            'tool_consumer_instance_name' => 'SchoolU',
            'tool_consumer_instance_description' => $tool_consumer_instance_description,
            'tool_consumer_instance_url' => 'http://lmsng.school.edu',
            'tool_consumer_instance_contact_email' => 'System.Admin@school.edu'
        ];

//        $endpoint = str_replace("dev.php",$_POST['custom_assn'],$launch_url);
        $endpoint = $launch_url;
        $endpoint = ConfigInfo::removeRelativePath($endpoint);

        $parms = LTI::signParameters($params, $endpoint, "POST", $key, $secret,
            "Finish Launch", $tool_consumer_instance_guid, $tool_consumer_instance_description);

        $content = LTI::postLaunchHTML($parms, $endpoint, false,
            "width=\"100%\" height=\"900\" scrolling=\"auto\" frameborder=\"0\" transparency");

        return $content;
    }

}