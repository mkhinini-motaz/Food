<?php

namespace Database\Seeders\PriceChanger;

use Illuminate\Console\Command;

abstract class GhostChefPriceChanger
{
    const TACOS_GEANT_ID = 1;
    const TACOS_GST_ID   = 2;
    const TACOS_V_ID     = 3;
    const TACOS_VH_ID    = 4;
    const TACOS_PANE_ID  = 5;
    const TACOS_CB_ID    = 6;
    const TACOS_CHW_ID   = 7;
    const TACOS_ESC_ID   = 8;

    const SANDWICH_GST_ID  = 9;
    const SANDWICH_V_ID    = 10;
    const SANDWICH_VH_ID   = 11;
    const SANDWICH_PANE_ID = 12;
    const SANDWICH_CB_ID   = 13;
    const SANDWICH_CHW_ID  = 14;
    const SANDWICH_ESC_ID  = 15;
    const SANDWICH_THON_ID = 16;

    const PIZZA_CHOIX_ID = 17;
    const PIZZA_GST_ID   = 18;
    const PIZZA_VH_ID    = 19;
    const PIZZA_4F_ID    = 20;
    const PIZZA_ESC_ID   = 21;
    const PIZZA_CHW_ID   = 22;
    const PIZZA_THON_ID  = 23;
    const PIZZA_PEP_ID   = 24;
    const PIZZA_CAPRI_ID = 25;
    const PIZZA_NAP_ID   = 26;
    const PIZZA_VEG_ID   = 27;
    const PIZZA_MARG_ID  = 28;

    const PIZZA_SB_GST_ID   = 29;
    const PIZZA_SB_4F_ID    = 30;
    const PIZZA_SB_CAPRI_ID = 31;

    const SUPP_CB_ID          = 32;
    const SUPP_PANE_ID        = 40;
    const SUPP_FRIT_ID        = 33;
    const SUPP_4F_ID          = 41;
    const SUPP_BACON_BOEUF_ID = 42;
    const SUPP_BACON_DINDE_ID = 43;
    const SUPP_PEP_ID         = 44;
    const SUPP_CHEDAR_ID      = 45;
    const SUPP_MOZZA_ID       = 46;
    const SUPP_CHAMP_ID       = 47;
    const SUPP_JAMB_ID        = 48;

    const DRINK_SHARK_ID    = 34;
    const DRINK_SHWEPS_ID   = 35;
    const DRINK_ORANGINA_ID = 36;
    const DRINK_CANETTE_ID  = 37;
    const DRINK_MI_KBIR_ID  = 38;
    const DRINK_MI_SGHIR_ID = 39;

    const OPTION_4F_ID          = 21;
    const OPTION_BACON_BOEUF_ID = 22;
    const OPTION_BACON_DINDE_ID = 23;
    const OPTION_PEP_ID         = 24;
    const OPTION_CB_ID          = 25;
    const OPTION_CHEDAR_ID      = 26;
    const OPTION_MOZZA_ID       = 27;
    const OPTION_JAMB_ID        = 28;
}
