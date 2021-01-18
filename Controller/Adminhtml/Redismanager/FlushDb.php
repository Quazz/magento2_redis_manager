<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2019 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace Tigren\RedisManager\Controller\Adminhtml\Redismanager;

use Exception;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;

class FlushDb extends FlushAbstract
{

    public function execute()
    {
        $id = $this->request->getParam('id');
        $services = $this->redisManagerHelper->getServices();
        if ($id === false || !isset($services[$id])) {
            $this->messageManager->addErrorMessage('The requested service was not found');
        } else {
            try {
                $this->redisManagerHelper->flushDb($services[$id]);
                $this->messageManager->addSuccessMessage('The Redis Service has been flushed.');
            } catch (Exception $e) {
                $this->messageManager->addErrorMessage('The Redis Service was not flushed');
            }
        }

        return $this->resultRedirectFactory->create()->setPath('redismanager/redismanager', ['_current' => true]);
    }
}
