<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2019 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace Tigren\RedisManager\Controller\Adminhtml\Redismanager;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\App\Response\RedirectInterface;
use Magento\Framework\App\RequestInterface;
use Tigren\RedisManager\Helper\Data;

abstract class FlushAbstract implements ActionInterface
{
    /**
     * @var ManagerInterface
     */
    protected $messageManager;

    /**
     * @var Data
     */
    protected $redisManagerHelper;

    /**
     * FlushAll constructor.
     *
     * @param MessageManager $messageManager
     * @param Data $redisManagerHelper
     */
    public function __construct(
        Data $redisManagerHelper,
        ManagerInterface $messageManager,
        RedirectInterface $redirect,
        RequestInterface $request
    ) {
        $this->messageManager = $messageManager;
        $this->redisManagerHelper = $redisManagerHelper;
        $this->redirect = $redirect;
        $this->request = $request;
    }
}
