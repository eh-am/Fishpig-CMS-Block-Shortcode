# Fishpig CMS Block Shortcode

Use Magento CMS Static Block as a shortcode in your Wordpress-Fishpig-integrated
posts!


Create a file in *app/etc/modules/LWM_FishpigCMSBlockShortcode.xml* with the following content:

````xml
<?xml version="1.0"?>
<config>
    <modules>
        <LWM_FishpigCMSBlockShortcode>
	        <active>true</active>
	        <codePool>local</codePool>
        </LWM_FishpigCMSBlockShortcode>
    </modules>
</config>
````


Extract this source to app/code/local

Activate: Magento Admin Panel -> System -> Configuration -> Advanced.

Create a CMS Block: Magento Admin Panel -> CMS -> Static Block -> Create, and give it a id
 
 
Then use in your Wordpress post:

````
[magento_cms_block id="CMS_BLOCK_ID"]
````

Voilá!



<sub>Tested in Magento 1.7.0.2 and Fishpig 3.1.0.7</sub>