<?php
require_once('vendor/autoload.php');
 
$stripe = array(
    'secret_key' => 'sk_test_51H9yDQLUVxvpXh5FST7BP0B0eHUMIomoh4TUHw5gVW5XzJTbyGGFsIEMASUXRPmVkMHrtZL4xteVBKxKs5BwCSEv00YvEdiaqj',
    'publishable_key' => 'pk_test_51H9yDQLUVxvpXh5FvceL30RxRpiOTZx3U1jPbJBDHVzROm6SI9zgfLjQ8y0hixwF3RTTkhivFpVLJskoe7GPebd900zZwnTNjb',
);
 
\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>