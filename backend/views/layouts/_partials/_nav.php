<?php

use yii\helpers\Url;

?>
<!-- nav -->
<nav class="nav-primary hidden-xs">
    <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">目录</div>
    <ul class="nav nav-main" data-ride="collapse">
        <li >
            <a href="<?= Url::to(['dashboard/index']) ?>" class="auto">
            <i class="i i-statistics icon">
            </i>
            <span class="font-bold">统计分析</span>
            </a>
        </li>
        <li >
            <a href="#" class="auto">
            <span class="pull-right text-muted">
            <i class="i i-circle-sm-o text"></i>
            <i class="i i-circle-sm text-active"></i>
            </span>
            <i class="i i-stack icon">
            </i>
            <span class="font-bold">产品管理</span>
            </a>
            <ul class="nav dk">
                <li >
                    <a href="<?= Url::to(['product/index']) ?>" class="auto">
                    <i class="i i-dot"></i>
                    <span>产品列表</span>
                    </a>
                </li>
                <li >
                    <a href="<?= Url::to(['product/create']) ?>" class="auto">
                    <i class="i i-dot"></i>
                    <span>添加产品</span>
                    </a>
                </li>
                <li >
                    <a href="<?= Url::to(['product-category/index']) ?>" class="auto">
                    <i class="i i-dot"></i>
                    <span>分类列表</span>
                    </a>
                </li>
                <li >
                    <a href="<?= Url::to(['product-category/create']) ?>" class="auto">
                    <i class="i i-dot"></i>
                    <span>添加分类</span>
                    </a>
                </li>
                <li >
                    <a href="<?= Url::to(['product-attribute-category/index']) ?>" class="auto">
                    <i class="i i-dot"></i>
                    <span>属性分类</span>
                    </a>
                </li>
                <li >
                    <a href="<?= Url::to(['product-attribute/index']) ?>" class="auto">
                    <i class="i i-dot"></i>
                    <span>属性列表</span>
                    </a>
                </li>
                <li >
                    <a href="<?= Url::to(['product-attribute/create']) ?>" class="auto">
                    <i class="i i-dot"></i>
                    <span>添加属性</span>
                    </a>
                </li>
            </ul>
        </li>
        <li >
            <a href="#" class="auto">
            <span class="pull-right text-muted">
            <i class="i i-circle-sm-o text"></i>
            <i class="i i-circle-sm text-active"></i>
            </span>
            <i class="i i-meter icon">
            </i>
            <span class="font-bold">订单管理</span>
            </a>
            <ul class="nav dk">
                <li>
                    <a href="<?= Url::to(['order/index']) ?>" class="auto">
                    <i class="i i-dot"></i>
                    <span>订单列表</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="line dk hidden-nav-xs"></div>
    <div class="text-muted text-xs hidden-nav-xs padder m-t-sm m-b-sm">快捷访问</div>
    <ul class="nav">
        <li>
            <a href="<?= Url::to(['product/index']) ?>">
            <i class="i i-circle-sm text-info-dk"></i>
            <span>产品列表</span>
            </a>
        </li>
        <li>
            <a href="<?= Url::to(['order/index']) ?>">
            <i class="i i-circle-sm text-success-dk"></i>
            <span>订单列表</span>
            </a>
        </li
    </ul>
</nav>
<!-- / nav -->