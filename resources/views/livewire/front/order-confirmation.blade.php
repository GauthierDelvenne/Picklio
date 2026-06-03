<x-front.orderConfirmation :title="__('commons.pageName.front.order-confirmation')"
                           :sub-title="__('front.order-confirmation.thanks')"
                           :items="$this->orderItems"
                           :order="$order"/>
