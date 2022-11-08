<?php

namespace Database\Seeders\PriceChanger;

class GhostChefPriceChangerV1 extends GhostChefPriceChanger
{
    const PRODUCT_PRICES = [
        self::TACOS_GEANT_ID => 13000,
        self::TACOS_GST_ID   => 8500,
        self::TACOS_V_ID     => 8000,
        self::TACOS_VH_ID    => 7600,
        self::TACOS_PANE_ID  => 7500,
        self::TACOS_CB_ID    => 7000,
        self::TACOS_CHW_ID   => 6400,
        self::TACOS_ESC_ID   => 6400,

        self::SANDWICH_GST_ID  => 8200,
        self::SANDWICH_V_ID    => 7800,
        self::SANDWICH_VH_ID   => 6800,
        self::SANDWICH_PANE_ID => 7300,
        self::SANDWICH_CB_ID   => 6700,
        self::SANDWICH_CHW_ID  => 6200,
        self::SANDWICH_ESC_ID  => 6200,
        self::SANDWICH_THON_ID => 6000,

        self::PIZZA_CHOIX_ID => 15000,
        self::PIZZA_GST_ID   => 15000,
        self::PIZZA_VH_ID    => 13000,
        self::PIZZA_4F_ID    => 13000,
        self::PIZZA_ESC_ID   => 13000,
        self::PIZZA_CHW_ID   => 13000,
        self::PIZZA_THON_ID  => 12000,
        self::PIZZA_PEP_ID   => 12000,
        self::PIZZA_CAPRI_ID => 12000,
        self::PIZZA_NAP_ID   => 11500,
        self::PIZZA_VEG_ID   => 11000,
        self::PIZZA_MARG_ID  => 9000,

        self::PIZZA_SB_GST_ID   => 15000,
        self::PIZZA_SB_4F_ID    => 13000,
        self::PIZZA_SB_CAPRI_ID => 12000,

        self::SUPP_CB_ID          => 2500,
        self::SUPP_PANE_ID        => 2500,
        self::SUPP_FRIT_ID        => 2000,
        self::SUPP_4F_ID          => 3000,
        self::SUPP_BACON_BOEUF_ID => 3000,
        self::SUPP_BACON_DINDE_ID => 2500,
        self::SUPP_PEP_ID         => 2000,
        self::SUPP_CHEDAR_ID      => 1500,
        self::SUPP_MOZZA_ID       => 1500,
        self::SUPP_CHAMP_ID       => 1500,
        self::SUPP_JAMB_ID        => 1500,

        self::DRINK_SHARK_ID    => 5000,
        self::DRINK_SHWEPS_ID   => 2500,
        self::DRINK_ORANGINA_ID => 2000,
        self::DRINK_CANETTE_ID  => 1500,
        self::DRINK_MI_KBIR_ID  => 1500,
        self::DRINK_MI_SGHIR_ID => 1000,
    ];

    const OPTION_PRICES = [
        self::OPTION_4F_ID          => 3000,
        self::OPTION_BACON_BOEUF_ID => 3000,
        self::OPTION_BACON_DINDE_ID => 2500,
        self::OPTION_PEP_ID         => 2000,
        self::OPTION_CB_ID          => 2500,
        self::OPTION_CHEDAR_ID      => 1500,
        self::OPTION_MOZZA_ID       => 1500,
        self::OPTION_JAMB_ID        => 1500,
    ];
}
