<?php include "../validation_of_user_manager.php"; ?>

<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en-US">
<!--<![endif]-->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="pingback" href="../xmlrpc.php">

  <title>User Manager Panel</title>
  <meta name='robots' content='max-image-preview:large' />
  <link rel='dns-prefetch' href='http://maps.googleapis.com/' />
  <link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
  <link rel='preconnect' href='https://fonts.gstatic.com/' crossorigin />
  <link rel="alternate" type="application/rss+xml" title="  &raquo; Feed" href="../feed/index.html" />
  <link rel="alternate" type="application/rss+xml" title="  &raquo; Comments Feed" href="../comments/feed/index.html" />
  <link rel='stylesheet' id='wp-block-library-css' href='../wp-includes/css/dist/block-library/style.min6a4d.css?ver=6.1.1' type='text/css' media='all' />
  <link rel='stylesheet' id='wc-blocks-vendors-style-css' href='../wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/wc-blocks-vendors-style556e.css?ver=9.4.4' type='text/css' media='all' />
  <link rel='stylesheet' id='wc-blocks-style-css' href='../wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/wc-blocks-style556e.css?ver=9.4.4' type='text/css' media='all' />
  <link rel='stylesheet' id='classic-theme-styles-css' href='../wp-includes/css/classic-themes.min68b3.css?ver=1' type='text/css' media='all' />
  <style id='global-styles-inline-css' type='text/css'>
    body {
      --wp--preset--color--black: #000000;
      --wp--preset--color--cyan-bluish-gray: #abb8c3;
      --wp--preset--color--white: #ffffff;
      --wp--preset--color--pale-pink: #f78da7;
      --wp--preset--color--vivid-red: #cf2e2e;
      --wp--preset--color--luminous-vivid-orange: #ff6900;
      --wp--preset--color--luminous-vivid-amber: #fcb900;
      --wp--preset--color--light-green-cyan: #7bdcb5;
      --wp--preset--color--vivid-green-cyan: #00d084;
      --wp--preset--color--pale-cyan-blue: #8ed1fc;
      --wp--preset--color--vivid-cyan-blue: #0693e3;
      --wp--preset--color--vivid-purple: #9b51e0;
      --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
      --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
      --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
      --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
      --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
      --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
      --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
      --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
      --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
      --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
      --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
      --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
      --wp--preset--duotone--dark-grayscale: url('#wp-duotone-dark-grayscale');
      --wp--preset--duotone--grayscale: url('#wp-duotone-grayscale');
      --wp--preset--duotone--purple-yellow: url('#wp-duotone-purple-yellow');
      --wp--preset--duotone--blue-red: url('#wp-duotone-blue-red');
      --wp--preset--duotone--midnight: url('#wp-duotone-midnight');
      --wp--preset--duotone--magenta-yellow: url('#wp-duotone-magenta-yellow');
      --wp--preset--duotone--purple-green: url('#wp-duotone-purple-green');
      --wp--preset--duotone--blue-orange: url('#wp-duotone-blue-orange');
      --wp--preset--font-size--small: 13px;
      --wp--preset--font-size--medium: 20px;
      --wp--preset--font-size--large: 36px;
      --wp--preset--font-size--x-large: 42px;
      --wp--preset--spacing--20: 0.44rem;
      --wp--preset--spacing--30: 0.67rem;
      --wp--preset--spacing--40: 1rem;
      --wp--preset--spacing--50: 1.5rem;
      --wp--preset--spacing--60: 2.25rem;
      --wp--preset--spacing--70: 3.38rem;
      --wp--preset--spacing--80: 5.06rem;
    }

    :where(.is-layout-flex) {
      gap: 0.5em;
    }

    body .is-layout-flow>.alignleft {
      float: left;
      margin-inline-start: 0;
      margin-inline-end: 2em;
    }

    body .is-layout-flow>.alignright {
      float: right;
      margin-inline-start: 2em;
      margin-inline-end: 0;
    }

    body .is-layout-flow>.aligncenter {
      margin-left: auto !important;
      margin-right: auto !important;
    }

    body .is-layout-constrained>.alignleft {
      float: left;
      margin-inline-start: 0;
      margin-inline-end: 2em;
    }

    body .is-layout-constrained>.alignright {
      float: right;
      margin-inline-start: 2em;
      margin-inline-end: 0;
    }

    body .is-layout-constrained>.aligncenter {
      margin-left: auto !important;
      margin-right: auto !important;
    }

    body .is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
      max-width: var(--wp--style--global--content-size);
      margin-left: auto !important;
      margin-right: auto !important;
    }

    body .is-layout-constrained>.alignwide {
      max-width: var(--wp--style--global--wide-size);
    }

    body .is-layout-flex {
      display: flex;
    }

    body .is-layout-flex {
      flex-wrap: wrap;
      align-items: center;
    }

    body .is-layout-flex>* {
      margin: 0;
    }

    :where(.wp-block-columns.is-layout-flex) {
      gap: 2em;
    }

    .has-black-color {
      color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-color {
      color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-color {
      color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-color {
      color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-color {
      color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-color {
      color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-color {
      color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-color {
      color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-color {
      color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-color {
      color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-color {
      color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-color {
      color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-black-background-color {
      background-color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-background-color {
      background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-background-color {
      background-color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-background-color {
      background-color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-background-color {
      background-color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-background-color {
      background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-background-color {
      background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-background-color {
      background-color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-background-color {
      background-color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-background-color {
      background-color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-background-color {
      background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-background-color {
      background-color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-black-border-color {
      border-color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-border-color {
      border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-border-color {
      border-color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-border-color {
      border-color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-border-color {
      border-color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-border-color {
      border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-border-color {
      border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-border-color {
      border-color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-border-color {
      border-color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-border-color {
      border-color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-border-color {
      border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-border-color {
      border-color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
      background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
    }

    .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
      background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
    }

    .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
      background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-orange-to-vivid-red-gradient-background {
      background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
    }

    .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
      background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
    }

    .has-cool-to-warm-spectrum-gradient-background {
      background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
    }

    .has-blush-light-purple-gradient-background {
      background: var(--wp--preset--gradient--blush-light-purple) !important;
    }

    .has-blush-bordeaux-gradient-background {
      background: var(--wp--preset--gradient--blush-bordeaux) !important;
    }

    .has-luminous-dusk-gradient-background {
      background: var(--wp--preset--gradient--luminous-dusk) !important;
    }

    .has-pale-ocean-gradient-background {
      background: var(--wp--preset--gradient--pale-ocean) !important;
    }

    .has-electric-grass-gradient-background {
      background: var(--wp--preset--gradient--electric-grass) !important;
    }

    .has-midnight-gradient-background {
      background: var(--wp--preset--gradient--midnight) !important;
    }

    .has-small-font-size {
      font-size: var(--wp--preset--font-size--small) !important;
    }

    .has-medium-font-size {
      font-size: var(--wp--preset--font-size--medium) !important;
    }

    .has-large-font-size {
      font-size: var(--wp--preset--font-size--large) !important;
    }

    .has-x-large-font-size {
      font-size: var(--wp--preset--font-size--x-large) !important;
    }

    .wp-block-navigation a:where(:not(.wp-element-button)) {
      color: inherit;
    }

    :where(.wp-block-columns.is-layout-flex) {
      gap: 2em;
    }

    .wp-block-pullquote {
      font-size: 1.5em;
      line-height: 1.6;
    }
  </style>
  <style id='extendify-gutenberg-patterns-and-templates-utilities-inline-css' type='text/css'>
    .ext-absolute {
      position: absolute !important;
    }

    .ext-relative {
      position: relative !important;
    }

    .ext-top-base {
      top: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-top-lg {
      top: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext--top-base {
      top: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
    }

    .ext--top-lg {
      top: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
    }

    .ext-right-base {
      right: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-right-lg {
      right: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext--right-base {
      right: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
    }

    .ext--right-lg {
      right: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
    }

    .ext-bottom-base {
      bottom: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-bottom-lg {
      bottom: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext--bottom-base {
      bottom: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
    }

    .ext--bottom-lg {
      bottom: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
    }

    .ext-left-base {
      left: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-left-lg {
      left: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext--left-base {
      left: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
    }

    .ext--left-lg {
      left: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
    }

    .ext-order-1 {
      order: 1 !important;
    }

    .ext-order-2 {
      order: 2 !important;
    }

    .ext-col-auto {
      grid-column: auto !important;
    }

    .ext-col-span-1 {
      grid-column: span 1 / span 1 !important;
    }

    .ext-col-span-2 {
      grid-column: span 2 / span 2 !important;
    }

    .ext-col-span-3 {
      grid-column: span 3 / span 3 !important;
    }

    .ext-col-span-4 {
      grid-column: span 4 / span 4 !important;
    }

    .ext-col-span-5 {
      grid-column: span 5 / span 5 !important;
    }

    .ext-col-span-6 {
      grid-column: span 6 / span 6 !important;
    }

    .ext-col-span-7 {
      grid-column: span 7 / span 7 !important;
    }

    .ext-col-span-8 {
      grid-column: span 8 / span 8 !important;
    }

    .ext-col-span-9 {
      grid-column: span 9 / span 9 !important;
    }

    .ext-col-span-10 {
      grid-column: span 10 / span 10 !important;
    }

    .ext-col-span-11 {
      grid-column: span 11 / span 11 !important;
    }

    .ext-col-span-12 {
      grid-column: span 12 / span 12 !important;
    }

    .ext-col-span-full {
      grid-column: 1 / -1 !important;
    }

    .ext-col-start-1 {
      grid-column-start: 1 !important;
    }

    .ext-col-start-2 {
      grid-column-start: 2 !important;
    }

    .ext-col-start-3 {
      grid-column-start: 3 !important;
    }

    .ext-col-start-4 {
      grid-column-start: 4 !important;
    }

    .ext-col-start-5 {
      grid-column-start: 5 !important;
    }

    .ext-col-start-6 {
      grid-column-start: 6 !important;
    }

    .ext-col-start-7 {
      grid-column-start: 7 !important;
    }

    .ext-col-start-8 {
      grid-column-start: 8 !important;
    }

    .ext-col-start-9 {
      grid-column-start: 9 !important;
    }

    .ext-col-start-10 {
      grid-column-start: 10 !important;
    }

    .ext-col-start-11 {
      grid-column-start: 11 !important;
    }

    .ext-col-start-12 {
      grid-column-start: 12 !important;
    }

    .ext-col-start-13 {
      grid-column-start: 13 !important;
    }

    .ext-col-start-auto {
      grid-column-start: auto !important;
    }

    .ext-col-end-1 {
      grid-column-end: 1 !important;
    }

    .ext-col-end-2 {
      grid-column-end: 2 !important;
    }

    .ext-col-end-3 {
      grid-column-end: 3 !important;
    }

    .ext-col-end-4 {
      grid-column-end: 4 !important;
    }

    .ext-col-end-5 {
      grid-column-end: 5 !important;
    }

    .ext-col-end-6 {
      grid-column-end: 6 !important;
    }

    .ext-col-end-7 {
      grid-column-end: 7 !important;
    }

    .ext-col-end-8 {
      grid-column-end: 8 !important;
    }

    .ext-col-end-9 {
      grid-column-end: 9 !important;
    }

    .ext-col-end-10 {
      grid-column-end: 10 !important;
    }

    .ext-col-end-11 {
      grid-column-end: 11 !important;
    }

    .ext-col-end-12 {
      grid-column-end: 12 !important;
    }

    .ext-col-end-13 {
      grid-column-end: 13 !important;
    }

    .ext-col-end-auto {
      grid-column-end: auto !important;
    }

    .ext-row-auto {
      grid-row: auto !important;
    }

    .ext-row-span-1 {
      grid-row: span 1 / span 1 !important;
    }

    .ext-row-span-2 {
      grid-row: span 2 / span 2 !important;
    }

    .ext-row-span-3 {
      grid-row: span 3 / span 3 !important;
    }

    .ext-row-span-4 {
      grid-row: span 4 / span 4 !important;
    }

    .ext-row-span-5 {
      grid-row: span 5 / span 5 !important;
    }

    .ext-row-span-6 {
      grid-row: span 6 / span 6 !important;
    }

    .ext-row-span-full {
      grid-row: 1 / -1 !important;
    }

    .ext-row-start-1 {
      grid-row-start: 1 !important;
    }

    .ext-row-start-2 {
      grid-row-start: 2 !important;
    }

    .ext-row-start-3 {
      grid-row-start: 3 !important;
    }

    .ext-row-start-4 {
      grid-row-start: 4 !important;
    }

    .ext-row-start-5 {
      grid-row-start: 5 !important;
    }

    .ext-row-start-6 {
      grid-row-start: 6 !important;
    }

    .ext-row-start-7 {
      grid-row-start: 7 !important;
    }

    .ext-row-start-auto {
      grid-row-start: auto !important;
    }

    .ext-row-end-1 {
      grid-row-end: 1 !important;
    }

    .ext-row-end-2 {
      grid-row-end: 2 !important;
    }

    .ext-row-end-3 {
      grid-row-end: 3 !important;
    }

    .ext-row-end-4 {
      grid-row-end: 4 !important;
    }

    .ext-row-end-5 {
      grid-row-end: 5 !important;
    }

    .ext-row-end-6 {
      grid-row-end: 6 !important;
    }

    .ext-row-end-7 {
      grid-row-end: 7 !important;
    }

    .ext-row-end-auto {
      grid-row-end: auto !important;
    }

    .ext-m-0:not([style*="margin"]) {
      margin: 0 !important;
    }

    .ext-m-auto:not([style*="margin"]) {
      margin: auto !important;
    }

    .ext-m-base:not([style*="margin"]) {
      margin: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-m-lg:not([style*="margin"]) {
      margin: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext--m-base:not([style*="margin"]) {
      margin: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
    }

    .ext--m-lg:not([style*="margin"]) {
      margin: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
    }

    .ext-mx-0:not([style*="margin"]) {
      margin-left: 0 !important;
      margin-right: 0 !important;
    }

    .ext-mx-auto:not([style*="margin"]) {
      margin-left: auto !important;
      margin-right: auto !important;
    }

    .ext-mx-base:not([style*="margin"]) {
      margin-left: var(--wp--style--block-gap, 1.75rem) !important;
      margin-right: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-mx-lg:not([style*="margin"]) {
      margin-left: var(--extendify--spacing--large, 3rem) !important;
      margin-right: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext--mx-base:not([style*="margin"]) {
      margin-left: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      margin-right: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
    }

    .ext--mx-lg:not([style*="margin"]) {
      margin-left: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      margin-right: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
    }

    .ext-my-0:not([style*="margin"]) {
      margin-top: 0 !important;
      margin-bottom: 0 !important;
    }

    .ext-my-auto:not([style*="margin"]) {
      margin-top: auto !important;
      margin-bottom: auto !important;
    }

    .ext-my-base:not([style*="margin"]) {
      margin-top: var(--wp--style--block-gap, 1.75rem) !important;
      margin-bottom: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-my-lg:not([style*="margin"]) {
      margin-top: var(--extendify--spacing--large, 3rem) !important;
      margin-bottom: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext--my-base:not([style*="margin"]) {
      margin-top: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      margin-bottom: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
    }

    .ext--my-lg:not([style*="margin"]) {
      margin-top: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      margin-bottom: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
    }

    .ext-mt-0:not([style*="margin"]) {
      margin-top: 0 !important;
    }

    .ext-mt-auto:not([style*="margin"]) {
      margin-top: auto !important;
    }

    .ext-mt-base:not([style*="margin"]) {
      margin-top: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-mt-lg:not([style*="margin"]) {
      margin-top: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext--mt-base:not([style*="margin"]) {
      margin-top: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
    }

    .ext--mt-lg:not([style*="margin"]) {
      margin-top: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
    }

    .ext-mr-0:not([style*="margin"]) {
      margin-right: 0 !important;
    }

    .ext-mr-auto:not([style*="margin"]) {
      margin-right: auto !important;
    }

    .ext-mr-base:not([style*="margin"]) {
      margin-right: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-mr-lg:not([style*="margin"]) {
      margin-right: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext--mr-base:not([style*="margin"]) {
      margin-right: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
    }

    .ext--mr-lg:not([style*="margin"]) {
      margin-right: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
    }

    .ext-mb-0:not([style*="margin"]) {
      margin-bottom: 0 !important;
    }

    .ext-mb-auto:not([style*="margin"]) {
      margin-bottom: auto !important;
    }

    .ext-mb-base:not([style*="margin"]) {
      margin-bottom: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-mb-lg:not([style*="margin"]) {
      margin-bottom: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext--mb-base:not([style*="margin"]) {
      margin-bottom: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
    }

    .ext--mb-lg:not([style*="margin"]) {
      margin-bottom: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
    }

    .ext-ml-0:not([style*="margin"]) {
      margin-left: 0 !important;
    }

    .ext-ml-auto:not([style*="margin"]) {
      margin-left: auto !important;
    }

    .ext-ml-base:not([style*="margin"]) {
      margin-left: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-ml-lg:not([style*="margin"]) {
      margin-left: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext--ml-base:not([style*="margin"]) {
      margin-left: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
    }

    .ext--ml-lg:not([style*="margin"]) {
      margin-left: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
    }

    .ext-block {
      display: block !important;
    }

    .ext-inline-block {
      display: inline-block !important;
    }

    .ext-inline {
      display: inline !important;
    }

    .ext-flex {
      display: flex !important;
    }

    .ext-inline-flex {
      display: inline-flex !important;
    }

    .ext-grid {
      display: grid !important;
    }

    .ext-inline-grid {
      display: inline-grid !important;
    }

    .ext-hidden {
      display: none !important;
    }

    .ext-w-auto {
      width: auto !important;
    }

    .ext-w-full {
      width: 100% !important;
    }

    .ext-max-w-full {
      max-width: 100% !important;
    }

    .ext-flex-1 {
      flex: 1 1 0% !important;
    }

    .ext-flex-auto {
      flex: 1 1 auto !important;
    }

    .ext-flex-initial {
      flex: 0 1 auto !important;
    }

    .ext-flex-none {
      flex: none !important;
    }

    .ext-flex-shrink-0 {
      flex-shrink: 0 !important;
    }

    .ext-flex-shrink {
      flex-shrink: 1 !important;
    }

    .ext-flex-grow-0 {
      flex-grow: 0 !important;
    }

    .ext-flex-grow {
      flex-grow: 1 !important;
    }

    .ext-list-none {
      list-style-type: none !important;
    }

    .ext-grid-cols-1 {
      grid-template-columns: repeat(1, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-2 {
      grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-3 {
      grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-4 {
      grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-5 {
      grid-template-columns: repeat(5, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-6 {
      grid-template-columns: repeat(6, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-7 {
      grid-template-columns: repeat(7, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-8 {
      grid-template-columns: repeat(8, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-9 {
      grid-template-columns: repeat(9, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-10 {
      grid-template-columns: repeat(10, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-11 {
      grid-template-columns: repeat(11, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-12 {
      grid-template-columns: repeat(12, minmax(0, 1fr)) !important;
    }

    .ext-grid-cols-none {
      grid-template-columns: none !important;
    }

    .ext-grid-rows-1 {
      grid-template-rows: repeat(1, minmax(0, 1fr)) !important;
    }

    .ext-grid-rows-2 {
      grid-template-rows: repeat(2, minmax(0, 1fr)) !important;
    }

    .ext-grid-rows-3 {
      grid-template-rows: repeat(3, minmax(0, 1fr)) !important;
    }

    .ext-grid-rows-4 {
      grid-template-rows: repeat(4, minmax(0, 1fr)) !important;
    }

    .ext-grid-rows-5 {
      grid-template-rows: repeat(5, minmax(0, 1fr)) !important;
    }

    .ext-grid-rows-6 {
      grid-template-rows: repeat(6, minmax(0, 1fr)) !important;
    }

    .ext-grid-rows-none {
      grid-template-rows: none !important;
    }

    .ext-flex-row {
      flex-direction: row !important;
    }

    .ext-flex-row-reverse {
      flex-direction: row-reverse !important;
    }

    .ext-flex-col {
      flex-direction: column !important;
    }

    .ext-flex-col-reverse {
      flex-direction: column-reverse !important;
    }

    .ext-flex-wrap {
      flex-wrap: wrap !important;
    }

    .ext-flex-wrap-reverse {
      flex-wrap: wrap-reverse !important;
    }

    .ext-flex-nowrap {
      flex-wrap: nowrap !important;
    }

    .ext-items-start {
      align-items: flex-start !important;
    }

    .ext-items-end {
      align-items: flex-end !important;
    }

    .ext-items-center {
      align-items: center !important;
    }

    .ext-items-baseline {
      align-items: baseline !important;
    }

    .ext-items-stretch {
      align-items: stretch !important;
    }

    .ext-justify-start {
      justify-content: flex-start !important;
    }

    .ext-justify-end {
      justify-content: flex-end !important;
    }

    .ext-justify-center {
      justify-content: center !important;
    }

    .ext-justify-between {
      justify-content: space-between !important;
    }

    .ext-justify-around {
      justify-content: space-around !important;
    }

    .ext-justify-evenly {
      justify-content: space-evenly !important;
    }

    .ext-justify-items-start {
      justify-items: start !important;
    }

    .ext-justify-items-end {
      justify-items: end !important;
    }

    .ext-justify-items-center {
      justify-items: center !important;
    }

    .ext-justify-items-stretch {
      justify-items: stretch !important;
    }

    .ext-gap-0 {
      gap: 0 !important;
    }

    .ext-gap-base {
      gap: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-gap-lg {
      gap: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext-gap-x-0 {
      -moz-column-gap: 0 !important;
      column-gap: 0 !important;
    }

    .ext-gap-x-base {
      -moz-column-gap: var(--wp--style--block-gap, 1.75rem) !important;
      column-gap: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-gap-x-lg {
      -moz-column-gap: var(--extendify--spacing--large, 3rem) !important;
      column-gap: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext-gap-y-0 {
      row-gap: 0 !important;
    }

    .ext-gap-y-base {
      row-gap: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-gap-y-lg {
      row-gap: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext-justify-self-auto {
      justify-self: auto !important;
    }

    .ext-justify-self-start {
      justify-self: start !important;
    }

    .ext-justify-self-end {
      justify-self: end !important;
    }

    .ext-justify-self-center {
      justify-self: center !important;
    }

    .ext-justify-self-stretch {
      justify-self: stretch !important;
    }

    .ext-rounded-none {
      border-radius: 0px !important;
    }

    .ext-rounded-full {
      border-radius: 9999px !important;
    }

    .ext-rounded-t-none {
      border-top-left-radius: 0px !important;
      border-top-right-radius: 0px !important;
    }

    .ext-rounded-t-full {
      border-top-left-radius: 9999px !important;
      border-top-right-radius: 9999px !important;
    }

    .ext-rounded-r-none {
      border-top-right-radius: 0px !important;
      border-bottom-right-radius: 0px !important;
    }

    .ext-rounded-r-full {
      border-top-right-radius: 9999px !important;
      border-bottom-right-radius: 9999px !important;
    }

    .ext-rounded-b-none {
      border-bottom-right-radius: 0px !important;
      border-bottom-left-radius: 0px !important;
    }

    .ext-rounded-b-full {
      border-bottom-right-radius: 9999px !important;
      border-bottom-left-radius: 9999px !important;
    }

    .ext-rounded-l-none {
      border-top-left-radius: 0px !important;
      border-bottom-left-radius: 0px !important;
    }

    .ext-rounded-l-full {
      border-top-left-radius: 9999px !important;
      border-bottom-left-radius: 9999px !important;
    }

    .ext-rounded-tl-none {
      border-top-left-radius: 0px !important;
    }

    .ext-rounded-tl-full {
      border-top-left-radius: 9999px !important;
    }

    .ext-rounded-tr-none {
      border-top-right-radius: 0px !important;
    }

    .ext-rounded-tr-full {
      border-top-right-radius: 9999px !important;
    }

    .ext-rounded-br-none {
      border-bottom-right-radius: 0px !important;
    }

    .ext-rounded-br-full {
      border-bottom-right-radius: 9999px !important;
    }

    .ext-rounded-bl-none {
      border-bottom-left-radius: 0px !important;
    }

    .ext-rounded-bl-full {
      border-bottom-left-radius: 9999px !important;
    }

    .ext-border-0 {
      border-width: 0px !important;
    }

    .ext-border-t-0 {
      border-top-width: 0px !important;
    }

    .ext-border-r-0 {
      border-right-width: 0px !important;
    }

    .ext-border-b-0 {
      border-bottom-width: 0px !important;
    }

    .ext-border-l-0 {
      border-left-width: 0px !important;
    }

    .ext-p-0:not([style*="padding"]) {
      padding: 0 !important;
    }

    .ext-p-base:not([style*="padding"]) {
      padding: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-p-lg:not([style*="padding"]) {
      padding: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext-px-0:not([style*="padding"]) {
      padding-left: 0 !important;
      padding-right: 0 !important;
    }

    .ext-px-base:not([style*="padding"]) {
      padding-left: var(--wp--style--block-gap, 1.75rem) !important;
      padding-right: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-px-lg:not([style*="padding"]) {
      padding-left: var(--extendify--spacing--large, 3rem) !important;
      padding-right: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext-py-0:not([style*="padding"]) {
      padding-top: 0 !important;
      padding-bottom: 0 !important;
    }

    .ext-py-base:not([style*="padding"]) {
      padding-top: var(--wp--style--block-gap, 1.75rem) !important;
      padding-bottom: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-py-lg:not([style*="padding"]) {
      padding-top: var(--extendify--spacing--large, 3rem) !important;
      padding-bottom: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext-pt-0:not([style*="padding"]) {
      padding-top: 0 !important;
    }

    .ext-pt-base:not([style*="padding"]) {
      padding-top: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-pt-lg:not([style*="padding"]) {
      padding-top: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext-pr-0:not([style*="padding"]) {
      padding-right: 0 !important;
    }

    .ext-pr-base:not([style*="padding"]) {
      padding-right: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-pr-lg:not([style*="padding"]) {
      padding-right: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext-pb-0:not([style*="padding"]) {
      padding-bottom: 0 !important;
    }

    .ext-pb-base:not([style*="padding"]) {
      padding-bottom: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-pb-lg:not([style*="padding"]) {
      padding-bottom: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext-pl-0:not([style*="padding"]) {
      padding-left: 0 !important;
    }

    .ext-pl-base:not([style*="padding"]) {
      padding-left: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .ext-pl-lg:not([style*="padding"]) {
      padding-left: var(--extendify--spacing--large, 3rem) !important;
    }

    .ext-text-left {
      text-align: left !important;
    }

    .ext-text-center {
      text-align: center !important;
    }

    .ext-text-right {
      text-align: right !important;
    }

    .ext-leading-none {
      line-height: 1 !important;
    }

    .ext-leading-tight {
      line-height: 1.25 !important;
    }

    .ext-leading-snug {
      line-height: 1.375 !important;
    }

    .ext-leading-normal {
      line-height: 1.5 !important;
    }

    .ext-leading-relaxed {
      line-height: 1.625 !important;
    }

    .ext-leading-loose {
      line-height: 2 !important;
    }

    .ext-aspect-square img {
      aspect-ratio: 1 / 1 !important;
      -o-object-fit: cover !important;
      object-fit: cover !important;
    }

    .ext-aspect-landscape img {
      aspect-ratio: 4 / 3 !important;
      -o-object-fit: cover !important;
      object-fit: cover !important;
    }

    .ext-aspect-landscape-wide img {
      aspect-ratio: 16 / 9 !important;
      -o-object-fit: cover !important;
      object-fit: cover !important;
    }

    .ext-aspect-portrait img {
      aspect-ratio: 3 / 4 !important;
      -o-object-fit: cover !important;
      object-fit: cover !important;
    }

    .ext-aspect-square .components-resizable-box__container,
    .ext-aspect-landscape .components-resizable-box__container,
    .ext-aspect-landscape-wide .components-resizable-box__container,
    .ext-aspect-portrait .components-resizable-box__container {
      height: auto !important;
    }

    .clip-path--rhombus img {
      -webkit-clip-path: polygon(15% 6%, 80% 29%, 84% 93%, 23% 69%) !important;
      clip-path: polygon(15% 6%, 80% 29%, 84% 93%, 23% 69%) !important;
    }

    .clip-path--diamond img {
      -webkit-clip-path: polygon(5% 29%, 60% 2%, 91% 64%, 36% 89%) !important;
      clip-path: polygon(5% 29%, 60% 2%, 91% 64%, 36% 89%) !important;
    }

    .clip-path--rhombus-alt img {
      -webkit-clip-path: polygon(14% 9%, 85% 24%, 91% 89%, 19% 76%) !important;
      clip-path: polygon(14% 9%, 85% 24%, 91% 89%, 19% 76%) !important;
    }




    .wp-block-columns[class*="fullwidth-cols"] {
      
      margin-bottom: unset !important;
    }

    .wp-block-column.editor\:pointer-events-none {
      
      margin-top: 0 !important;
      margin-bottom: 0 !important;
    }

    .is-root-container.block-editor-block-list__layout>[data-align="full"]:not(:first-of-type)>.wp-block-column.editor\:pointer-events-none,
    .is-root-container.block-editor-block-list__layout>[data-align="wide"]>.wp-block-column.editor\:pointer-events-none {
      
      margin-top: calc(-1 * var(--wp--style--block-gap, 28px)) !important;
    }

    .is-root-container.block-editor-block-list__layout>[data-align="full"]:not(:first-of-type)>.ext-my-0,
    .is-root-container.block-editor-block-list__layout>[data-align="wide"]>.ext-my-0:not([style*="margin"]) {
      
      margin-top: calc(-1 * var(--wp--style--block-gap, 28px)) !important;
    }

    

    .ext .wp-block-columns .wp-block-column[style*="padding"] {
      
      padding-left: 0 !important;
      padding-right: 0 !important;
    }

    /* Some popular themes add double spacing between columns; remove it */

    .ext .wp-block-columns+.wp-block-columns:not([class*="mt-"]):not([class*="my-"]):not([style*="margin"]) {
      
      margin-top: 0 !important;
    }

    [class*="fullwidth-cols"] .wp-block-column:first-child,
    [class*="fullwidth-cols"] .wp-block-group:first-child {
      
    }

    [class*="fullwidth-cols"] .wp-block-column:first-child,
    [class*="fullwidth-cols"] .wp-block-group:first-child {
      margin-top: 0 !important;
    }

    [class*="fullwidth-cols"] .wp-block-column:last-child,
    [class*="fullwidth-cols"] .wp-block-group:last-child {
      
    }

    [class*="fullwidth-cols"] .wp-block-column:last-child,
    [class*="fullwidth-cols"] .wp-block-group:last-child {
      margin-bottom: 0 !important;
    }

    [class*="fullwidth-cols"] .wp-block-column:first-child>* {
      
      margin-top: 0 !important;
    }

    [class*="fullwidth-cols"] .wp-block-column>*:first-child {
      
      margin-top: 0 !important;
    }

    [class*="fullwidth-cols"] .wp-block-column>*:last-child {
      
      margin-bottom: 0 !important;
    }

    .ext .is-not-stacked-on-mobile .wp-block-column {
      
      margin-bottom: 0 !important;
    }

    /* Add base margin bottom to all columns */

    .wp-block-columns[class*="fullwidth-cols"]:not(.is-not-stacked-on-mobile)>.wp-block-column:not(:last-child) {
      
      margin-bottom: var(--wp--style--block-gap, 1.75rem) !important;
    }

    @media (min-width: 782px) {
      .wp-block-columns[class*="fullwidth-cols"]:not(.is-not-stacked-on-mobile)>.wp-block-column:not(:last-child) {
        
        margin-bottom: 0 !important;
      }
    }

    /* Remove margin bottom from "not-stacked" columns */

    .wp-block-columns[class*="fullwidth-cols"].is-not-stacked-on-mobile>.wp-block-column {
      
      margin-bottom: 0 !important;
    }

    @media (min-width: 600px) and (max-width: 781px) {
      .wp-block-columns[class*="fullwidth-cols"]:not(.is-not-stacked-on-mobile)>.wp-block-column:nth-child(even) {
        
        margin-left: var(--wp--style--block-gap, 2em) !important;
      }
    }




    @media (max-width: 781px) {
      .tablet\:fullwidth-cols.wp-block-columns:not(.is-not-stacked-on-mobile) {
        flex-wrap: wrap !important;
      }

      .tablet\:fullwidth-cols.wp-block-columns:not(.is-not-stacked-on-mobile)>.wp-block-column {
        margin-left: 0 !important;
      }

      .tablet\:fullwidth-cols.wp-block-columns:not(.is-not-stacked-on-mobile)>.wp-block-column:not([style*="margin"]) {
        
        margin-left: 0 !important;
      }

      .tablet\:fullwidth-cols.wp-block-columns:not(.is-not-stacked-on-mobile)>.wp-block-column {
        flex-basis: 100% !important;
        /* Required to negate core/columns flex-basis */
      }
    }

    @media (max-width: 1079px) {
      .desktop\:fullwidth-cols.wp-block-columns:not(.is-not-stacked-on-mobile) {
        flex-wrap: wrap !important;
      }

      .desktop\:fullwidth-cols.wp-block-columns:not(.is-not-stacked-on-mobile)>.wp-block-column {
        margin-left: 0 !important;
      }

      .desktop\:fullwidth-cols.wp-block-columns:not(.is-not-stacked-on-mobile)>.wp-block-column:not([style*="margin"]) {
        
        margin-left: 0 !important;
      }

      .desktop\:fullwidth-cols.wp-block-columns:not(.is-not-stacked-on-mobile)>.wp-block-column {
        flex-basis: 100% !important;
        /* Required to negate core/columns flex-basis */
      }

      .desktop\:fullwidth-cols.wp-block-columns:not(.is-not-stacked-on-mobile)>.wp-block-column:not(:last-child) {
        margin-bottom: var(--wp--style--block-gap, 1.75rem) !important;
      }
    }

    .direction-rtl {
      direction: rtl !important;
    }

    .direction-ltr {
      direction: ltr !important;
    }

    /* Use "is-style-" prefix to support adding this style to the core/list block */

    .is-style-inline-list {
      padding-left: 0 !important;
    }

    .is-style-inline-list li {
      
      list-style-type: none !important;
    }

    @media (min-width: 782px) {
      .is-style-inline-list li {
        margin-right: var(--wp--style--block-gap, 1.75rem) !important;
        display: inline !important;
      }
    }

    .is-style-inline-list li:first-child {
      
    }

    @media (min-width: 782px) {
      .is-style-inline-list li:first-child {
        margin-left: 0 !important;
      }
    }

    .is-style-inline-list li:last-child {
      
    }

    @media (min-width: 782px) {
      .is-style-inline-list li:last-child {
        margin-right: 0 !important;
      }
    }

    .bring-to-front {
      position: relative !important;
      z-index: 10 !important;
    }

    .text-stroke {
      -webkit-text-stroke-width: var(--wp--custom--typography--text-stroke-width,
          2px) !important;
      -webkit-text-stroke-color: var(--wp--preset--color--background) !important;
    }

    .text-stroke--primary {
      -webkit-text-stroke-width: var(--wp--custom--typography--text-stroke-width,
          2px) !important;
      -webkit-text-stroke-color: var(--wp--preset--color--primary) !important;
    }

    .text-stroke--secondary {
      -webkit-text-stroke-width: var(--wp--custom--typography--text-stroke-width,
          2px) !important;
      -webkit-text-stroke-color: var(--wp--preset--color--secondary) !important;
    }

    .editor\:no-caption .block-editor-rich-text__editable {
      display: none !important;
    }

    .editor\:no-inserter>.block-list-appender,
    .editor\:no-inserter .wp-block-group__inner-container>.block-list-appender {
      display: none !important;
    }

    .editor\:no-inserter .wp-block-cover__inner-container>.block-list-appender {
      display: none !important;
    }

    .editor\:no-inserter .wp-block-column:not(.is-selected)>.block-list-appender {
      display: none !important;
    }

    .editor\:no-resize .components-resizable-box__handle::after,
    .editor\:no-resize .components-resizable-box__side-handle::before,
    .editor\:no-resize .components-resizable-box__handle {
      display: none !important;
      pointer-events: none !important;
    }

    .editor\:no-resize .components-resizable-box__container {
      display: block !important;
    }

    .editor\:pointer-events-none {
      pointer-events: none !important;
    }

    .is-style-angled {
      
      align-items: center !important;
      justify-content: flex-end !important;
    }

    .ext .is-style-angled>[class*="_inner-container"] {
      align-items: center !important;
    }

    .is-style-angled .wp-block-cover__image-background,
    .is-style-angled .wp-block-cover__video-background {
      
      -webkit-clip-path: polygon(0 0, 30% 0%, 50% 100%, 0% 100%) !important;
      clip-path: polygon(0 0, 30% 0%, 50% 100%, 0% 100%) !important;
      z-index: 1 !important;
    }

    @media (min-width: 782px) {

      .is-style-angled .wp-block-cover__image-background,
      .is-style-angled .wp-block-cover__video-background {
        
        -webkit-clip-path: polygon(0 0, 55% 0%, 65% 100%, 0% 100%) !important;
        clip-path: polygon(0 0, 55% 0%, 65% 100%, 0% 100%) !important;
      }
    }

    .has-foreground-color {
      
      color: var(--wp--preset--color--foreground, #000) !important;
    }

    .has-foreground-background-color {
      
      background-color: var(--wp--preset--color--foreground, #000) !important;
    }

    .has-background-color {
      
      color: var(--wp--preset--color--background, #fff) !important;
    }

    .has-background-background-color {
      
      background-color: var(--wp--preset--color--background, #fff) !important;
    }

    .has-primary-color {
      
      color: var(--wp--preset--color--primary, #4b5563) !important;
    }

    .has-primary-background-color {
      
      background-color: var(--wp--preset--color--primary, #4b5563) !important;
    }

    .has-secondary-color {
      
      color: var(--wp--preset--color--secondary, #9ca3af) !important;
    }

    .has-secondary-background-color {
      
      background-color: var(--wp--preset--color--secondary, #9ca3af) !important;
    }

    /* Ensure themes that target specific elements use the right colors */

    .ext.has-text-color p,
    .ext.has-text-color h1,
    .ext.has-text-color h2,
    .ext.has-text-color h3,
    .ext.has-text-color h4,
    .ext.has-text-color h5,
    .ext.has-text-color h6 {
      
      color: currentColor !important;
    }

    .has-white-color {
      
      color: var(--wp--preset--color--white, #fff) !important;
    }

    .has-black-color {
      
      color: var(--wp--preset--color--black, #000) !important;
    }

    .has-ext-foreground-background-color {
      
      background-color: var(--wp--preset--color--foreground,
          var(--wp--preset--color--black, #000)) !important;
    }

    .has-ext-primary-background-color {
      
      background-color: var(--wp--preset--color--primary,
          var(--wp--preset--color--cyan-bluish-gray, #000)) !important;
    }

    /* Fix button borders with specified background colors */

    .wp-block-button__link.has-black-background-color {
      
      border-color: var(--wp--preset--color--black, #000) !important;
    }

    .wp-block-button__link.has-white-background-color {
      
      border-color: var(--wp--preset--color--white, #fff) !important;
    }

    .has-ext-small-font-size {
      
      font-size: var(--wp--preset--font-size--ext-small) !important;
    }

    .has-ext-medium-font-size {
      
      font-size: var(--wp--preset--font-size--ext-medium) !important;
    }

    .has-ext-large-font-size {
      
      font-size: var(--wp--preset--font-size--ext-large) !important;
      line-height: 1.2 !important;
    }

    .has-ext-x-large-font-size {
      
      font-size: var(--wp--preset--font-size--ext-x-large) !important;
      line-height: 1 !important;
    }

    .has-ext-xx-large-font-size {
      
      font-size: var(--wp--preset--font-size--ext-xx-large) !important;
      line-height: 1 !important;
    }

    /* Line height */

    .has-ext-x-large-font-size:not([style*="line-height"]) {
      
      line-height: 1.1 !important;
    }

    .has-ext-xx-large-font-size:not([style*="line-height"]) {
      
      line-height: 1.1 !important;
    }

    .ext .wp-block-group>* {
      /* Line height */
      margin-top: 0 !important;
      margin-bottom: 0 !important;
    }

    .ext .wp-block-group>*+* {
      margin-top: var(--wp--style--block-gap, 1.75rem) !important;
      margin-bottom: 0 !important;
    }

    .ext h2 {
      margin-top: var(--wp--style--block-gap, 1.75rem) !important;
      margin-bottom: var(--wp--style--block-gap, 1.75rem) !important;
    }

    .has-ext-x-large-font-size+p,
    .has-ext-x-large-font-size+h3 {
      margin-top: 0.5rem !important;
    }

    .ext .wp-block-buttons>.wp-block-button.wp-block-button__width-25 {
      width: calc(25% - var(--wp--style--block-gap, 0.5em) * 0.75) !important;
      min-width: 12rem !important;
    }

    /* Classic themes use an inner [class*="_inner-container"] that our utilities cannot directly target, so we need to do so with a few */

    .ext .ext-grid>[class*="_inner-container"] {
      
      display: grid !important;
    }

    /* Unhinge grid for container blocks in classic themes, and < 5.9 */

    .ext>[class*="_inner-container"]>.ext-grid:not([class*="columns"]),
    .ext>[class*="_inner-container"]>.wp-block>.ext-grid:not([class*="columns"]) {
      
      display: initial !important;
    }

    /* Grid Columns */

    .ext .ext-grid-cols-1>[class*="_inner-container"] {
      
      grid-template-columns: repeat(1, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-2>[class*="_inner-container"] {
      
      grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-3>[class*="_inner-container"] {
      
      grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-4>[class*="_inner-container"] {
      
      grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-5>[class*="_inner-container"] {
      
      grid-template-columns: repeat(5, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-6>[class*="_inner-container"] {
      
      grid-template-columns: repeat(6, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-7>[class*="_inner-container"] {
      
      grid-template-columns: repeat(7, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-8>[class*="_inner-container"] {
      
      grid-template-columns: repeat(8, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-9>[class*="_inner-container"] {
      
      grid-template-columns: repeat(9, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-10>[class*="_inner-container"] {
      
      grid-template-columns: repeat(10, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-11>[class*="_inner-container"] {
      
      grid-template-columns: repeat(11, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-12>[class*="_inner-container"] {
      
      grid-template-columns: repeat(12, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-13>[class*="_inner-container"] {
      
      grid-template-columns: repeat(13, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-cols-none>[class*="_inner-container"] {
      
      grid-template-columns: none !important;
    }

    /* Grid Rows */

    .ext .ext-grid-rows-1>[class*="_inner-container"] {
      
      grid-template-rows: repeat(1, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-rows-2>[class*="_inner-container"] {
      
      grid-template-rows: repeat(2, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-rows-3>[class*="_inner-container"] {
      
      grid-template-rows: repeat(3, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-rows-4>[class*="_inner-container"] {
      
      grid-template-rows: repeat(4, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-rows-5>[class*="_inner-container"] {
      
      grid-template-rows: repeat(5, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-rows-6>[class*="_inner-container"] {
      
      grid-template-rows: repeat(6, minmax(0, 1fr)) !important;
    }

    .ext .ext-grid-rows-none>[class*="_inner-container"] {
      
      grid-template-rows: none !important;
    }

    /* Align */

    .ext .ext-items-start>[class*="_inner-container"] {
      align-items: flex-start !important;
    }

    .ext .ext-items-end>[class*="_inner-container"] {
      align-items: flex-end !important;
    }

    .ext .ext-items-center>[class*="_inner-container"] {
      align-items: center !important;
    }

    .ext .ext-items-baseline>[class*="_inner-container"] {
      align-items: baseline !important;
    }

    .ext .ext-items-stretch>[class*="_inner-container"] {
      align-items: stretch !important;
    }

    .ext.wp-block-group>*:last-child {
      
      margin-bottom: 0 !important;
    }

    /* For <5.9 */

    .ext .wp-block-group__inner-container {
      
      padding: 0 !important;
    }

    .ext.has-background {
      
      padding-left: var(--wp--style--block-gap, 1.75rem) !important;
      padding-right: var(--wp--style--block-gap, 1.75rem) !important;
    }

    /* Fallback for classic theme group blocks */

    .ext *[class*="inner-container"]>.alignwide *[class*="inner-container"],
    .ext *[class*="inner-container"]>[data-align="wide"] *[class*="inner-container"] {
      
      max-width: var(--responsive--alignwide-width, 120rem) !important;
    }

    .ext *[class*="inner-container"]>.alignwide *[class*="inner-container"]>*,
    .ext *[class*="inner-container"]>[data-align="wide"] *[class*="inner-container"]>* {
      
    }

    .ext *[class*="inner-container"]>.alignwide *[class*="inner-container"]>*,
    .ext *[class*="inner-container"]>[data-align="wide"] *[class*="inner-container"]>* {
      max-width: 100% !important;
    }

    /* Ensure image block display is standardized */

    .ext .wp-block-image {
      
      position: relative !important;
      text-align: center !important;
    }

    .ext .wp-block-image img {
      
      display: inline-block !important;
      vertical-align: middle !important;
    }

    body {
      
      /* We need to abstract this out of tailwind.config because clamp doesnt translate with negative margins */
      --extendify--spacing--large: var(--wp--custom--spacing--large,
          clamp(2em, 8vw, 8em)) !important;
      /* Add pattern preset font sizes */
      --wp--preset--font-size--ext-small: 1rem !important;
      --wp--preset--font-size--ext-medium: 1.125rem !important;
      --wp--preset--font-size--ext-large: clamp(1.65rem, 3.5vw, 2.15rem) !important;
      --wp--preset--font-size--ext-x-large: clamp(3rem, 6vw, 4.75rem) !important;
      --wp--preset--font-size--ext-xx-large: clamp(3.25rem, 7.5vw, 5.75rem) !important;
      /* Fallbacks for pre 5.9 themes */
      --wp--preset--color--black: #000 !important;
      --wp--preset--color--white: #fff !important;
    }

    .ext * {
      box-sizing: border-box !important;
    }

    /* Astra: Remove spacer block visuals in the library */

    .block-editor-block-preview__content-iframe .ext [data-type="core/spacer"] .components-resizable-box__container {
      
      background: transparent !important;
    }

    .block-editor-block-preview__content-iframe .ext [data-type="core/spacer"] .block-library-spacer__resize-container::before {
      
      display: none !important;
    }

    /* Twenty Twenty adds a lot of margin automatically to blocks. We only want our own margin added to our patterns. */

    .ext .wp-block-group__inner-container figure.wp-block-gallery.alignfull {
      
      margin-top: unset !important;
      margin-bottom: unset !important;
    }

    /* Ensure no funky business is assigned to alignwide */

    .ext .alignwide {
      
      margin-left: auto !important;
      margin-right: auto !important;
    }

    /* Negate blockGap being inappropriately assigned in the editor */

    .is-root-container.block-editor-block-list__layout>[data-align="full"]:not(:first-of-type)>.ext-my-0,
    .is-root-container.block-editor-block-list__layout>[data-align="wide"]>.ext-my-0:not([style*="margin"]) {
      
      margin-top: calc(-1 * var(--wp--style--block-gap, 28px)) !important;
    }

    /* Ensure vh content in previews looks taller */

    .block-editor-block-preview__content-iframe .preview\:min-h-50 {
      
      min-height: 50vw !important;
    }

    .block-editor-block-preview__content-iframe .preview\:min-h-60 {
      
      min-height: 60vw !important;
    }

    .block-editor-block-preview__content-iframe .preview\:min-h-70 {
      
      min-height: 70vw !important;
    }

    .block-editor-block-preview__content-iframe .preview\:min-h-80 {
      
      min-height: 80vw !important;
    }

    .block-editor-block-preview__content-iframe .preview\:min-h-100 {
      
      min-height: 100vw !important;
    }

    /*  Removes excess margin when applied to the alignfull parent div in Block Themes */

    .ext-mr-0.alignfull:not([style*="margin"]):not([style*="margin"]) {
      
      margin-right: 0 !important;
    }

    .ext-ml-0:not([style*="margin"]):not([style*="margin"]) {
      
      margin-left: 0 !important;
    }

    /*  Ensures fullwidth blocks display properly in the editor when margin is zeroed out */

    .is-root-container .wp-block[data-align="full"]>.ext-mx-0:not([style*="margin"]):not([style*="margin"]) {
      
      margin-right: calc(1 * var(--wp--custom--spacing--outer, 0)) !important;
      margin-left: calc(1 * var(--wp--custom--spacing--outer, 0)) !important;
      overflow: hidden !important;
      width: unset !important;
    }

    @media (min-width: 782px) {
      .tablet\:ext-absolute {
        position: absolute !important;
      }

      .tablet\:ext-relative {
        position: relative !important;
      }

      .tablet\:ext-top-base {
        top: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-top-lg {
        top: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext--top-base {
        top: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .tablet\:ext--top-lg {
        top: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .tablet\:ext-right-base {
        right: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-right-lg {
        right: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext--right-base {
        right: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .tablet\:ext--right-lg {
        right: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .tablet\:ext-bottom-base {
        bottom: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-bottom-lg {
        bottom: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext--bottom-base {
        bottom: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .tablet\:ext--bottom-lg {
        bottom: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .tablet\:ext-left-base {
        left: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-left-lg {
        left: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext--left-base {
        left: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .tablet\:ext--left-lg {
        left: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .tablet\:ext-order-1 {
        order: 1 !important;
      }

      .tablet\:ext-order-2 {
        order: 2 !important;
      }

      .tablet\:ext-m-0:not([style*="margin"]) {
        margin: 0 !important;
      }

      .tablet\:ext-m-auto:not([style*="margin"]) {
        margin: auto !important;
      }

      .tablet\:ext-m-base:not([style*="margin"]) {
        margin: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-m-lg:not([style*="margin"]) {
        margin: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext--m-base:not([style*="margin"]) {
        margin: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .tablet\:ext--m-lg:not([style*="margin"]) {
        margin: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .tablet\:ext-mx-0:not([style*="margin"]) {
        margin-left: 0 !important;
        margin-right: 0 !important;
      }

      .tablet\:ext-mx-auto:not([style*="margin"]) {
        margin-left: auto !important;
        margin-right: auto !important;
      }

      .tablet\:ext-mx-base:not([style*="margin"]) {
        margin-left: var(--wp--style--block-gap, 1.75rem) !important;
        margin-right: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-mx-lg:not([style*="margin"]) {
        margin-left: var(--extendify--spacing--large, 3rem) !important;
        margin-right: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext--mx-base:not([style*="margin"]) {
        margin-left: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
        margin-right: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .tablet\:ext--mx-lg:not([style*="margin"]) {
        margin-left: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
        margin-right: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .tablet\:ext-my-0:not([style*="margin"]) {
        margin-top: 0 !important;
        margin-bottom: 0 !important;
      }

      .tablet\:ext-my-auto:not([style*="margin"]) {
        margin-top: auto !important;
        margin-bottom: auto !important;
      }

      .tablet\:ext-my-base:not([style*="margin"]) {
        margin-top: var(--wp--style--block-gap, 1.75rem) !important;
        margin-bottom: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-my-lg:not([style*="margin"]) {
        margin-top: var(--extendify--spacing--large, 3rem) !important;
        margin-bottom: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext--my-base:not([style*="margin"]) {
        margin-top: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
        margin-bottom: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .tablet\:ext--my-lg:not([style*="margin"]) {
        margin-top: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
        margin-bottom: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .tablet\:ext-mt-0:not([style*="margin"]) {
        margin-top: 0 !important;
      }

      .tablet\:ext-mt-auto:not([style*="margin"]) {
        margin-top: auto !important;
      }

      .tablet\:ext-mt-base:not([style*="margin"]) {
        margin-top: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-mt-lg:not([style*="margin"]) {
        margin-top: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext--mt-base:not([style*="margin"]) {
        margin-top: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .tablet\:ext--mt-lg:not([style*="margin"]) {
        margin-top: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .tablet\:ext-mr-0:not([style*="margin"]) {
        margin-right: 0 !important;
      }

      .tablet\:ext-mr-auto:not([style*="margin"]) {
        margin-right: auto !important;
      }

      .tablet\:ext-mr-base:not([style*="margin"]) {
        margin-right: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-mr-lg:not([style*="margin"]) {
        margin-right: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext--mr-base:not([style*="margin"]) {
        margin-right: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .tablet\:ext--mr-lg:not([style*="margin"]) {
        margin-right: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .tablet\:ext-mb-0:not([style*="margin"]) {
        margin-bottom: 0 !important;
      }

      .tablet\:ext-mb-auto:not([style*="margin"]) {
        margin-bottom: auto !important;
      }

      .tablet\:ext-mb-base:not([style*="margin"]) {
        margin-bottom: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-mb-lg:not([style*="margin"]) {
        margin-bottom: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext--mb-base:not([style*="margin"]) {
        margin-bottom: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .tablet\:ext--mb-lg:not([style*="margin"]) {
        margin-bottom: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .tablet\:ext-ml-0:not([style*="margin"]) {
        margin-left: 0 !important;
      }

      .tablet\:ext-ml-auto:not([style*="margin"]) {
        margin-left: auto !important;
      }

      .tablet\:ext-ml-base:not([style*="margin"]) {
        margin-left: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-ml-lg:not([style*="margin"]) {
        margin-left: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext--ml-base:not([style*="margin"]) {
        margin-left: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .tablet\:ext--ml-lg:not([style*="margin"]) {
        margin-left: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .tablet\:ext-block {
        display: block !important;
      }

      .tablet\:ext-inline-block {
        display: inline-block !important;
      }

      .tablet\:ext-inline {
        display: inline !important;
      }

      .tablet\:ext-flex {
        display: flex !important;
      }

      .tablet\:ext-inline-flex {
        display: inline-flex !important;
      }

      .tablet\:ext-grid {
        display: grid !important;
      }

      .tablet\:ext-inline-grid {
        display: inline-grid !important;
      }

      .tablet\:ext-hidden {
        display: none !important;
      }

      .tablet\:ext-w-auto {
        width: auto !important;
      }

      .tablet\:ext-w-full {
        width: 100% !important;
      }

      .tablet\:ext-max-w-full {
        max-width: 100% !important;
      }

      .tablet\:ext-flex-1 {
        flex: 1 1 0% !important;
      }

      .tablet\:ext-flex-auto {
        flex: 1 1 auto !important;
      }

      .tablet\:ext-flex-initial {
        flex: 0 1 auto !important;
      }

      .tablet\:ext-flex-none {
        flex: none !important;
      }

      .tablet\:ext-flex-shrink-0 {
        flex-shrink: 0 !important;
      }

      .tablet\:ext-flex-shrink {
        flex-shrink: 1 !important;
      }

      .tablet\:ext-flex-grow-0 {
        flex-grow: 0 !important;
      }

      .tablet\:ext-flex-grow {
        flex-grow: 1 !important;
      }

      .tablet\:ext-list-none {
        list-style-type: none !important;
      }

      .tablet\:ext-grid-cols-1 {
        grid-template-columns: repeat(1, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-2 {
        grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-3 {
        grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-4 {
        grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-5 {
        grid-template-columns: repeat(5, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-6 {
        grid-template-columns: repeat(6, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-7 {
        grid-template-columns: repeat(7, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-8 {
        grid-template-columns: repeat(8, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-9 {
        grid-template-columns: repeat(9, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-10 {
        grid-template-columns: repeat(10, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-11 {
        grid-template-columns: repeat(11, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-12 {
        grid-template-columns: repeat(12, minmax(0, 1fr)) !important;
      }

      .tablet\:ext-grid-cols-none {
        grid-template-columns: none !important;
      }

      .tablet\:ext-flex-row {
        flex-direction: row !important;
      }

      .tablet\:ext-flex-row-reverse {
        flex-direction: row-reverse !important;
      }

      .tablet\:ext-flex-col {
        flex-direction: column !important;
      }

      .tablet\:ext-flex-col-reverse {
        flex-direction: column-reverse !important;
      }

      .tablet\:ext-flex-wrap {
        flex-wrap: wrap !important;
      }

      .tablet\:ext-flex-wrap-reverse {
        flex-wrap: wrap-reverse !important;
      }

      .tablet\:ext-flex-nowrap {
        flex-wrap: nowrap !important;
      }

      .tablet\:ext-items-start {
        align-items: flex-start !important;
      }

      .tablet\:ext-items-end {
        align-items: flex-end !important;
      }

      .tablet\:ext-items-center {
        align-items: center !important;
      }

      .tablet\:ext-items-baseline {
        align-items: baseline !important;
      }

      .tablet\:ext-items-stretch {
        align-items: stretch !important;
      }

      .tablet\:ext-justify-start {
        justify-content: flex-start !important;
      }

      .tablet\:ext-justify-end {
        justify-content: flex-end !important;
      }

      .tablet\:ext-justify-center {
        justify-content: center !important;
      }

      .tablet\:ext-justify-between {
        justify-content: space-between !important;
      }

      .tablet\:ext-justify-around {
        justify-content: space-around !important;
      }

      .tablet\:ext-justify-evenly {
        justify-content: space-evenly !important;
      }

      .tablet\:ext-justify-items-start {
        justify-items: start !important;
      }

      .tablet\:ext-justify-items-end {
        justify-items: end !important;
      }

      .tablet\:ext-justify-items-center {
        justify-items: center !important;
      }

      .tablet\:ext-justify-items-stretch {
        justify-items: stretch !important;
      }

      .tablet\:ext-justify-self-auto {
        justify-self: auto !important;
      }

      .tablet\:ext-justify-self-start {
        justify-self: start !important;
      }

      .tablet\:ext-justify-self-end {
        justify-self: end !important;
      }

      .tablet\:ext-justify-self-center {
        justify-self: center !important;
      }

      .tablet\:ext-justify-self-stretch {
        justify-self: stretch !important;
      }

      .tablet\:ext-p-0:not([style*="padding"]) {
        padding: 0 !important;
      }

      .tablet\:ext-p-base:not([style*="padding"]) {
        padding: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-p-lg:not([style*="padding"]) {
        padding: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext-px-0:not([style*="padding"]) {
        padding-left: 0 !important;
        padding-right: 0 !important;
      }

      .tablet\:ext-px-base:not([style*="padding"]) {
        padding-left: var(--wp--style--block-gap, 1.75rem) !important;
        padding-right: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-px-lg:not([style*="padding"]) {
        padding-left: var(--extendify--spacing--large, 3rem) !important;
        padding-right: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext-py-0:not([style*="padding"]) {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
      }

      .tablet\:ext-py-base:not([style*="padding"]) {
        padding-top: var(--wp--style--block-gap, 1.75rem) !important;
        padding-bottom: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-py-lg:not([style*="padding"]) {
        padding-top: var(--extendify--spacing--large, 3rem) !important;
        padding-bottom: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext-pt-0:not([style*="padding"]) {
        padding-top: 0 !important;
      }

      .tablet\:ext-pt-base:not([style*="padding"]) {
        padding-top: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-pt-lg:not([style*="padding"]) {
        padding-top: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext-pr-0:not([style*="padding"]) {
        padding-right: 0 !important;
      }

      .tablet\:ext-pr-base:not([style*="padding"]) {
        padding-right: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-pr-lg:not([style*="padding"]) {
        padding-right: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext-pb-0:not([style*="padding"]) {
        padding-bottom: 0 !important;
      }

      .tablet\:ext-pb-base:not([style*="padding"]) {
        padding-bottom: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-pb-lg:not([style*="padding"]) {
        padding-bottom: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext-pl-0:not([style*="padding"]) {
        padding-left: 0 !important;
      }

      .tablet\:ext-pl-base:not([style*="padding"]) {
        padding-left: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .tablet\:ext-pl-lg:not([style*="padding"]) {
        padding-left: var(--extendify--spacing--large, 3rem) !important;
      }

      .tablet\:ext-text-left {
        text-align: left !important;
      }

      .tablet\:ext-text-center {
        text-align: center !important;
      }

      .tablet\:ext-text-right {
        text-align: right !important;
      }
    }

    @media (min-width: 1080px) {
      .desktop\:ext-absolute {
        position: absolute !important;
      }

      .desktop\:ext-relative {
        position: relative !important;
      }

      .desktop\:ext-top-base {
        top: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-top-lg {
        top: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext--top-base {
        top: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .desktop\:ext--top-lg {
        top: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .desktop\:ext-right-base {
        right: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-right-lg {
        right: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext--right-base {
        right: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .desktop\:ext--right-lg {
        right: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .desktop\:ext-bottom-base {
        bottom: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-bottom-lg {
        bottom: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext--bottom-base {
        bottom: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .desktop\:ext--bottom-lg {
        bottom: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .desktop\:ext-left-base {
        left: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-left-lg {
        left: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext--left-base {
        left: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .desktop\:ext--left-lg {
        left: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .desktop\:ext-order-1 {
        order: 1 !important;
      }

      .desktop\:ext-order-2 {
        order: 2 !important;
      }

      .desktop\:ext-m-0:not([style*="margin"]) {
        margin: 0 !important;
      }

      .desktop\:ext-m-auto:not([style*="margin"]) {
        margin: auto !important;
      }

      .desktop\:ext-m-base:not([style*="margin"]) {
        margin: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-m-lg:not([style*="margin"]) {
        margin: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext--m-base:not([style*="margin"]) {
        margin: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .desktop\:ext--m-lg:not([style*="margin"]) {
        margin: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .desktop\:ext-mx-0:not([style*="margin"]) {
        margin-left: 0 !important;
        margin-right: 0 !important;
      }

      .desktop\:ext-mx-auto:not([style*="margin"]) {
        margin-left: auto !important;
        margin-right: auto !important;
      }

      .desktop\:ext-mx-base:not([style*="margin"]) {
        margin-left: var(--wp--style--block-gap, 1.75rem) !important;
        margin-right: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-mx-lg:not([style*="margin"]) {
        margin-left: var(--extendify--spacing--large, 3rem) !important;
        margin-right: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext--mx-base:not([style*="margin"]) {
        margin-left: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
        margin-right: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .desktop\:ext--mx-lg:not([style*="margin"]) {
        margin-left: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
        margin-right: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .desktop\:ext-my-0:not([style*="margin"]) {
        margin-top: 0 !important;
        margin-bottom: 0 !important;
      }

      .desktop\:ext-my-auto:not([style*="margin"]) {
        margin-top: auto !important;
        margin-bottom: auto !important;
      }

      .desktop\:ext-my-base:not([style*="margin"]) {
        margin-top: var(--wp--style--block-gap, 1.75rem) !important;
        margin-bottom: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-my-lg:not([style*="margin"]) {
        margin-top: var(--extendify--spacing--large, 3rem) !important;
        margin-bottom: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext--my-base:not([style*="margin"]) {
        margin-top: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
        margin-bottom: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .desktop\:ext--my-lg:not([style*="margin"]) {
        margin-top: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
        margin-bottom: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .desktop\:ext-mt-0:not([style*="margin"]) {
        margin-top: 0 !important;
      }

      .desktop\:ext-mt-auto:not([style*="margin"]) {
        margin-top: auto !important;
      }

      .desktop\:ext-mt-base:not([style*="margin"]) {
        margin-top: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-mt-lg:not([style*="margin"]) {
        margin-top: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext--mt-base:not([style*="margin"]) {
        margin-top: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .desktop\:ext--mt-lg:not([style*="margin"]) {
        margin-top: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .desktop\:ext-mr-0:not([style*="margin"]) {
        margin-right: 0 !important;
      }

      .desktop\:ext-mr-auto:not([style*="margin"]) {
        margin-right: auto !important;
      }

      .desktop\:ext-mr-base:not([style*="margin"]) {
        margin-right: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-mr-lg:not([style*="margin"]) {
        margin-right: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext--mr-base:not([style*="margin"]) {
        margin-right: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .desktop\:ext--mr-lg:not([style*="margin"]) {
        margin-right: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .desktop\:ext-mb-0:not([style*="margin"]) {
        margin-bottom: 0 !important;
      }

      .desktop\:ext-mb-auto:not([style*="margin"]) {
        margin-bottom: auto !important;
      }

      .desktop\:ext-mb-base:not([style*="margin"]) {
        margin-bottom: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-mb-lg:not([style*="margin"]) {
        margin-bottom: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext--mb-base:not([style*="margin"]) {
        margin-bottom: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .desktop\:ext--mb-lg:not([style*="margin"]) {
        margin-bottom: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .desktop\:ext-ml-0:not([style*="margin"]) {
        margin-left: 0 !important;
      }

      .desktop\:ext-ml-auto:not([style*="margin"]) {
        margin-left: auto !important;
      }

      .desktop\:ext-ml-base:not([style*="margin"]) {
        margin-left: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-ml-lg:not([style*="margin"]) {
        margin-left: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext--ml-base:not([style*="margin"]) {
        margin-left: calc(var(--wp--style--block-gap, 1.75rem) * -1) !important;
      }

      .desktop\:ext--ml-lg:not([style*="margin"]) {
        margin-left: calc(var(--extendify--spacing--large, 3rem) * -1) !important;
      }

      .desktop\:ext-block {
        display: block !important;
      }

      .desktop\:ext-inline-block {
        display: inline-block !important;
      }

      .desktop\:ext-inline {
        display: inline !important;
      }

      .desktop\:ext-flex {
        display: flex !important;
      }

      .desktop\:ext-inline-flex {
        display: inline-flex !important;
      }

      .desktop\:ext-grid {
        display: grid !important;
      }

      .desktop\:ext-inline-grid {
        display: inline-grid !important;
      }

      .desktop\:ext-hidden {
        display: none !important;
      }

      .desktop\:ext-w-auto {
        width: auto !important;
      }

      .desktop\:ext-w-full {
        width: 100% !important;
      }

      .desktop\:ext-max-w-full {
        max-width: 100% !important;
      }

      .desktop\:ext-flex-1 {
        flex: 1 1 0% !important;
      }

      .desktop\:ext-flex-auto {
        flex: 1 1 auto !important;
      }

      .desktop\:ext-flex-initial {
        flex: 0 1 auto !important;
      }

      .desktop\:ext-flex-none {
        flex: none !important;
      }

      .desktop\:ext-flex-shrink-0 {
        flex-shrink: 0 !important;
      }

      .desktop\:ext-flex-shrink {
        flex-shrink: 1 !important;
      }

      .desktop\:ext-flex-grow-0 {
        flex-grow: 0 !important;
      }

      .desktop\:ext-flex-grow {
        flex-grow: 1 !important;
      }

      .desktop\:ext-list-none {
        list-style-type: none !important;
      }

      .desktop\:ext-grid-cols-1 {
        grid-template-columns: repeat(1, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-2 {
        grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-3 {
        grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-4 {
        grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-5 {
        grid-template-columns: repeat(5, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-6 {
        grid-template-columns: repeat(6, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-7 {
        grid-template-columns: repeat(7, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-8 {
        grid-template-columns: repeat(8, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-9 {
        grid-template-columns: repeat(9, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-10 {
        grid-template-columns: repeat(10, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-11 {
        grid-template-columns: repeat(11, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-12 {
        grid-template-columns: repeat(12, minmax(0, 1fr)) !important;
      }

      .desktop\:ext-grid-cols-none {
        grid-template-columns: none !important;
      }

      .desktop\:ext-flex-row {
        flex-direction: row !important;
      }

      .desktop\:ext-flex-row-reverse {
        flex-direction: row-reverse !important;
      }

      .desktop\:ext-flex-col {
        flex-direction: column !important;
      }

      .desktop\:ext-flex-col-reverse {
        flex-direction: column-reverse !important;
      }

      .desktop\:ext-flex-wrap {
        flex-wrap: wrap !important;
      }

      .desktop\:ext-flex-wrap-reverse {
        flex-wrap: wrap-reverse !important;
      }

      .desktop\:ext-flex-nowrap {
        flex-wrap: nowrap !important;
      }

      .desktop\:ext-items-start {
        align-items: flex-start !important;
      }

      .desktop\:ext-items-end {
        align-items: flex-end !important;
      }

      .desktop\:ext-items-center {
        align-items: center !important;
      }

      .desktop\:ext-items-baseline {
        align-items: baseline !important;
      }

      .desktop\:ext-items-stretch {
        align-items: stretch !important;
      }

      .desktop\:ext-justify-start {
        justify-content: flex-start !important;
      }

      .desktop\:ext-justify-end {
        justify-content: flex-end !important;
      }

      .desktop\:ext-justify-center {
        justify-content: center !important;
      }

      .desktop\:ext-justify-between {
        justify-content: space-between !important;
      }

      .desktop\:ext-justify-around {
        justify-content: space-around !important;
      }

      .desktop\:ext-justify-evenly {
        justify-content: space-evenly !important;
      }

      .desktop\:ext-justify-items-start {
        justify-items: start !important;
      }

      .desktop\:ext-justify-items-end {
        justify-items: end !important;
      }

      .desktop\:ext-justify-items-center {
        justify-items: center !important;
      }

      .desktop\:ext-justify-items-stretch {
        justify-items: stretch !important;
      }

      .desktop\:ext-justify-self-auto {
        justify-self: auto !important;
      }

      .desktop\:ext-justify-self-start {
        justify-self: start !important;
      }

      .desktop\:ext-justify-self-end {
        justify-self: end !important;
      }

      .desktop\:ext-justify-self-center {
        justify-self: center !important;
      }

      .desktop\:ext-justify-self-stretch {
        justify-self: stretch !important;
      }

      .desktop\:ext-p-0:not([style*="padding"]) {
        padding: 0 !important;
      }

      .desktop\:ext-p-base:not([style*="padding"]) {
        padding: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-p-lg:not([style*="padding"]) {
        padding: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext-px-0:not([style*="padding"]) {
        padding-left: 0 !important;
        padding-right: 0 !important;
      }

      .desktop\:ext-px-base:not([style*="padding"]) {
        padding-left: var(--wp--style--block-gap, 1.75rem) !important;
        padding-right: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-px-lg:not([style*="padding"]) {
        padding-left: var(--extendify--spacing--large, 3rem) !important;
        padding-right: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext-py-0:not([style*="padding"]) {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
      }

      .desktop\:ext-py-base:not([style*="padding"]) {
        padding-top: var(--wp--style--block-gap, 1.75rem) !important;
        padding-bottom: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-py-lg:not([style*="padding"]) {
        padding-top: var(--extendify--spacing--large, 3rem) !important;
        padding-bottom: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext-pt-0:not([style*="padding"]) {
        padding-top: 0 !important;
      }

      .desktop\:ext-pt-base:not([style*="padding"]) {
        padding-top: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-pt-lg:not([style*="padding"]) {
        padding-top: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext-pr-0:not([style*="padding"]) {
        padding-right: 0 !important;
      }

      .desktop\:ext-pr-base:not([style*="padding"]) {
        padding-right: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-pr-lg:not([style*="padding"]) {
        padding-right: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext-pb-0:not([style*="padding"]) {
        padding-bottom: 0 !important;
      }

      .desktop\:ext-pb-base:not([style*="padding"]) {
        padding-bottom: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-pb-lg:not([style*="padding"]) {
        padding-bottom: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext-pl-0:not([style*="padding"]) {
        padding-left: 0 !important;
      }

      .desktop\:ext-pl-base:not([style*="padding"]) {
        padding-left: var(--wp--style--block-gap, 1.75rem) !important;
      }

      .desktop\:ext-pl-lg:not([style*="padding"]) {
        padding-left: var(--extendify--spacing--large, 3rem) !important;
      }

      .desktop\:ext-text-left {
        text-align: left !important;
      }

      .desktop\:ext-text-center {
        text-align: center !important;
      }

      .desktop\:ext-text-right {
        text-align: right !important;
      }
    }
  </style>
  <link rel='stylesheet' id='fontawesome-latest-css-css' href='../wp-content/plugins/accesspress-social-login-lite/css/font-awesome/all.minb045.css?ver=3.4.8' type='text/css' media='all' />
  <link rel='stylesheet' id='apsl-frontend-css-css' href='../wp-content/plugins/accesspress-social-login-lite/css/frontendb045.css?ver=3.4.8' type='text/css' media='all' />
  <link rel='stylesheet' id='apss-font-awesome-four-css' href='../wp-content/plugins/accesspress-social-share/css/font-awesome.min62df.css?ver=4.5.6' type='text/css' media='all' />
  <link rel='stylesheet' id='apss-frontend-css-css' href='../wp-content/plugins/accesspress-social-share/css/frontend62df.css?ver=4.5.6' type='text/css' media='all' />
  <link rel='stylesheet' id='apss-font-opensans-css' href='http://fonts.googleapis.com/css?family=Open+Sans&amp;ver=6.1.1' type='text/css' media='all' />
  <link rel='stylesheet' id='woocommerce-layout-css' href='../wp-content/plugins/woocommerce/assets/css/woocommerce-layout9c05.css?ver=7.4.1' type='text/css' media='all' />
  <link rel='stylesheet' id='woocommerce-smallscreen-css' href='../wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen9c05.css?ver=7.4.1' type='text/css' media='only screen and (max-width: 768px)' />
  <link rel='stylesheet' id='woocommerce-general-css' href='../wp-content/plugins/woocommerce/assets/css/woocommerce9c05.css?ver=7.4.1' type='text/css' media='all' />
  <style id='woocommerce-inline-inline-css' type='text/css'>
    .woocommerce form .form-row .required {
      visibility: visible;
    }
  </style>
  <link rel='stylesheet' id='select2.min-css' href='../wp-content/themes/classiera/css/select2.min68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='jquery-ui-css' href='../wp-content/themes/classiera/css/jquery-ui.min68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='bootstrap-css' href='../wp-content/themes/classiera/css/bootstrap68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='animate.min-css' href='../wp-content/themes/classiera/css/animate.min68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='bootstrap-dropdownhover.min-css' href='../wp-content/themes/classiera/css/bootstrap-dropdownhover.min68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='classiera-components-css' href='../wp-content/themes/classiera/css/classiera-components68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='classiera-css' href='../wp-content/themes/classiera/css/classiera68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='fontawesome-css' href='../wp-content/themes/classiera/css/fontawesome68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='material-design-iconic-font-css' href='../wp-content/themes/classiera/css/material-design-iconic-font68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='owl.carousel.min-css' href='../wp-content/themes/classiera/css/owl.carousel.min68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='owl.theme.default.min-css' href='../wp-content/themes/classiera/css/owl.theme.default.min68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='responsive-css' href='../wp-content/themes/classiera/css/responsive68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='classiera-map-css' href='../wp-content/themes/classiera/css/classiera-map68b3.css?ver=1' type='text/css' media='all' />
  <link rel='stylesheet' id='bootstrap-slider-css' href='../wp-content/themes/classiera/css/bootstrap-slider68b3.css?ver=1' type='text/css' media='all' />
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css?family=Quicksand:700,400,500&amp;display=swap&amp;ver=1651390143" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand:700,400,500&amp;display=swap&amp;ver=1651390143" media="print" onload="this.media='all'"><noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand:700,400,500&amp;display=swap&amp;ver=1651390143" />
  </noscript>
  <script type='text/javascript' src='../wp-includes/js/jquery/jquery.mina7a0.js?ver=3.6.1' id='jquery-core-js'></script>
  <script type='text/javascript' src='../wp-includes/js/jquery/jquery-migrate.mind617.js?ver=3.3.2' id='jquery-migrate-js'></script>
  <script type='text/javascript' src='../wp-content/plugins/accesspress-social-login-lite/js/frontendb045.js?ver=3.4.8' id='apsl-frontend-js-js'></script>
  <link rel="https://api.w.org/" href="../wp-json/index.html" />
  <link rel="alternate" type="application/json" href="../wp-json/wp/v2/pages/49.json" />
  <link rel="EditURI" type="application/rsd+xml" title="RSD" href="../xmlrpc0db0.php?rsd" />
  <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="../wp-includes/wlwmanifest.xml" />
  <meta name="generator" content="WordPress 6.1.1" />
  <meta name="generator" content="WooCommerce 7.4.1" />
  <link rel="canonical" href="index.html" />
  <link rel='shortlink' href='../index0012.html?p=49' />
  <link rel="alternate" type="application/json+oembed" href="../wp-json/oembed/1.0/embeddd3b.json?url=https%3A%2F%2Fdemo.joinwebs.com%2Fclassiera%2Fplum%2Flogin%2F" />
  <link rel="alternate" type="text/xml+oembed" href="../wp-json/oembed/1.0/embeda597?url=https%3A%2F%2Fdemo.joinwebs.com%2Fclassiera%2Fplum%2Flogin%2F&amp;format=xml" />
  <meta name="generator" content="Redux 4.3.26" />
  <script type="text/javascript">
    var ajaxurl = '../wp-admin/admin-ajax.html';
    var classieraCurrentUserID = '0';
  </script>
  <style type="text/css">
    .topBar .login-info a.register,
    .search-section .search-form.search-form-v1 .form-group button:hover,
    .search-section.search-section-v3,
    section.search-section-v2,
    .search-section.search-section-v5 .form-group button:hover,
    .search-section.search-section-v6 .form-v6-bg .form-group button,
    .category-slider-small-box ul li a:hover,
    .classiera-premium-ads-v3 .premium-carousel-v3 .item figure figcaption .price span:first-of-type,
    .classiera-box-div-v3 figure figcaption .price span:first-of-type,
    .classiera-box-div-v5 figure .premium-img .price,
    .classiera-box-div-v6 figure .premium-img .price.btn-primary.active,
    .classiera-box-div-v7 figure figcaption .caption-tags .price,
    .classiera-box-div-v7 figure:hover figcaption,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v4 figure .detail .box-icon a:hover,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v5 figure .detail .price,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v6 figure .detail .price.btn-primary.active,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v7 figure .detail .price.btn-primary.active,
    .advertisement-v1 .tab-divs .view-as a:hover,
    .advertisement-v2 .view-as .btn-group a.active,
    .advertisement-v2 .nav-tabs>li:active>a,
    .advertisement-v2 .nav-tabs>li.active>a,
    .advertisement-v2 .nav-tabs>li.active>a:hover,
    .advertisement-v2 .nav-tabs>li>a:hover,
    .advertisement-v2 .nav-tabs>li>a:focus,
    .advertisement-v2 .nav-tabs>li>a:active,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li>a:hover,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li>a:active,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li>a:focus,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li:hover:before,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li.active:before,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li.active>a,
    .members .members-text h3,
    .members-v2 .members-text h4,
    .members-v4.members-v5 .member-content a.btn:hover,
    .locations .location-content .location .location-icon,
    .locations .location-content .location .location-icon .tip:after,
    .locations .location-content-v6 figure.location figcaption .location-caption span,
    .pricing-plan .pricing-plan-content .pricing-plan-box .pricing-plan-price,
    .pricing-plan-v2 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-price,
    .pricing-plan-v3 .pricing-plan-content .pricing-plan-box .pricing-plan-heading h4 span,
    .pricing-plan-v4 .pricing-plan-content .pricing-plan-box.popular,
    .pricing-plan-v4 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-heading,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box .pricing-plan-button .btn:hover,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box .pricing-plan-button .btn:focus,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box.popular,
    .pricing-plan-v6.pricing-plan-v7,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular .pricing-plan-button .btn,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular .pricing-plan-button .btn:hover,
    footer .widget-box .widget-content .footer-pr-widget-v1:hover .media-body .price,
    footer .widget-box .widget-content .grid-view-pr li span .hover-posts span,
    footer .widget-box .tagcloud a:hover,
    .footer-bottom ul.footer-bottom-social-icon li a:hover,
    #back-to-top:hover,
    .sidebar .widget-box .widget-content .grid-view-pr li span .hover-posts span,
    .sidebar .widget-box .tagcloud a:hover,
    .sidebar .widget-box .user-make-offer-message .nav>li>a:hover,
    .sidebar .widget-box .user-make-offer-message .nav>li.btnWatch button:hover,
    .sidebar .widget-box .user-make-offer-message .nav>li.active>a,
    .sidebar .widget-box .user-make-offer-message .nav>li.active>button,
    .inner-page-content .classiera-advertisement .item.item-list .classiera-box-div figure figcaption .price.visible-xs,
    .author-box .author-social .author-social-icons li>a:hover,
    .user-pages aside .user-page-list li a:hover,
    .user-pages aside .user-page-list li.active a,
    .user-pages aside .user-submit-ad .btn-user-submit-ad:hover,
    .user-pages .user-detail-section .user-social-profile-links ul li a:hover,
    .user-pages .user-detail-section .user-ads.follower .media .media-body>.classiera_follow_user input[type='submit']:hover,
    .user-pages .user-detail-section .user-ads.follower .media .media-body>.classiera_follow_user input[type='submit']:focus,
    .submit-post form .classiera-post-main-cat ul li a:hover,
    .submit-post form .classiera-post-main-cat ul li a:focus,
    .submit-post form .classiera-post-main-cat ul li.active a,
    .classiera_follow_user>input[type='submit']:hover,
    .classiera_follow_user>input[type='submit']:focus,
    .mobile-app-button li a:hover,
    .mobile-app-button li a:focus,
    .related-blog-post-section .navText a:hover,
    .pagination>li>a:hover,
    .pagination>li span:hover,
    .pagination>li:first-child>a:hover,
    .pagination>li:first-child span:hover,
    .pagination>li:last-child>a:hover,
    .pagination>li:last-child span:hover,
    .inputfile-1:focus+label,
    .inputfile-1.has-focus+label,
    .inputfile-1+label:hover,
    .classiera-navbar.classiera-navbar-v2 .category-menu-dropdown .category-menu-btn span,
    .classiera-navbar.classiera-navbar-v2 .category-menu-dropdown.open .category-menu-btn,
    .classiera-navbar.classiera-navbar-v2 .navbar-default .navbar-nav>li>.dropdown-menu>li>a:hover,
    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .navbar-nav .dropdown-menu li>a:hover,
    .classiera-navbar.classiera-navbar-v6 .navbar-default .navbar-nav>li>a:hover:after,
    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:last-of-type:hover,
    .classiera-navbar.classiera-navbar-v6 .dropdown .dropdown-menu,
    .offcanvas-light .log-reg-btn .offcanvas-log-reg-btn:hover,
    .offcanvas-light.offcanvas-dark .log-reg-btn .offcanvas-log-reg-btn:hover,
    .btn-primary:hover,
    .btn-primary:focus,
    .btn-primary:active,
    .btn-primary.active,
    .open>.dropdown-toggle.btn-primary,
    .btn-primary.active:hover,
    .btn-primary:active:hover,
    .btn-primary:active,
    .btn-primary.active,
    .btn-primary.outline:hover,
    .btn-primary.outline:focus,
    .btn-primary.outline:active,
    .btn-primary.outline.active,
    .open>.dropdown-toggle.btn-primary,
    .btn-primary.outline:active,
    .btn-primary.outline.active,
    .btn-primary.raised:active,
    .btn-primary.raised.active,
    .btn-style-four.active,
    .btn-style-four:hover,
    .btn-style-four:focus,
    .btn-style-four:active,
    .social-icon:hover,
    .social-icon-v2:hover,
    .woocommerce .button:hover,
    .woocommerce #respond input#submit.alt:hover,
    .woocommerce a.button.alt:hover,
    .woocommerce button.button.alt:hover,
    .woocommerce input.button.alt:hover,
    #ad-address span:hover i,
    .search-section.search-section-v3,
    .search-section.search-section-v4,
    #showNum:hover,
    .price.btn.btn-primary.round.btn-style-six.active,
    .woocommerce ul.products>li.product a>span,
    .woocommerce div.product .great,
    span.ad_type_display,
    .classiera-navbar.classiera-navbar-v5.classiera-navbar-minimal .custom-menu-v5 .menu-btn,
    .minimal_page_search_form button,
    .minimla_social_icon:hover,
    .classiera-navbar.classiera-navbar-v1 .betube-search .btn.outline:hover,
    .bid_notification,
    .bid_notification__icon {
      background: #D32323 !important;
    }

    .topBar .contact-info span i,
    .search-section.search-section-v5 .form-group button,
    .category-slider-small-box.outline-box ul li a:hover,
    .section-heading-v1.section-heading-with-icon h3 i,
    .classiera-premium-ads-v3 .premium-carousel-v3 .item figure figcaption h5 a:hover,
    .classiera-premium-ads-v3 .premium-carousel-v3 .item figure figcaption p a:hover,
    .classiera-box-div-v2 figure figcaption h5 a:hover,
    .classiera-box-div-v2 figure figcaption p span,
    .classiera-box-div-v3 figure figcaption h5 a:hover,
    .classiera-box-div-v3 figure figcaption span.category a:hover,
    .classiera-box-div-v4 figure figcaption h5 a:hover,
    .classiera-box-div-v5 figure figcaption h5 a:hover,
    .classiera-box-div-v5 figure figcaption .category span a:hover,
    .classiera-box-div-v6 figure figcaption .content>a:hover,
    .classiera-box-div-v6 figure figcaption .content h5 a:hover,
    .classiera-box-div-v6 figure figcaption .content .category span,
    .classiera-box-div-v6 figure .box-div-heading .category span,
    .classiera-category-ads-v4 .category-box .category-box-over .category-box-content h3 a:hover,
    .category-v2 .category-box .category-content .view-button a:hover,
    .category-v3 .category-content h4 a:hover,
    .category-v3 .category-content .view-all:hover,
    .category-v3 .category-content .view-all:hover i,
    .category-v5 .categories li .category-content h4 a:hover,
    .category-v7 .category-box figure figcaption ul li a:hover,
    .category-v7 .category-box figure figcaption>a:hover,
    .category-v7 .category-box figure figcaption>a:hover i,
    .category-v7 .category-box figure figcaption ul li a:hover i,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v3 figure figcaption .post-tags span i,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v3 figure figcaption .post-tags a:hover,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v5 figure .detail .box-icon a:hover,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v6 figure figcaption .content h5 a:hover,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v6 figure .detail .box-icon a:hover,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v7 figure figcaption .content h5 a:hover,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v7 figure .detail .box-icon a:hover,
    .advertisement-v1 .tab-divs .view-as a.active,
    .advertisement-v1 .tab-divs .view-as a.active i,
    .advertisement-v3 .view-head .tab-button .nav-tabs>li>a:hover,
    .advertisement-v3 .view-head .tab-button .nav-tabs>li>a:active,
    .advertisement-v3 .view-head .tab-button .nav-tabs>li>a:focus,
    .advertisement-v3 .view-head .tab-button .nav-tabs>li.active>a,
    .advertisement-v3 .view-head .view-as a:hover i,
    .advertisement-v3 .view-head .view-as a.active i,
    .advertisement-v6 .view-head .tab-button .nav-tabs>li>a:hover,
    .advertisement-v6 .view-head .tab-button .nav-tabs>li>a:active,
    .advertisement-v6 .view-head .tab-button .nav-tabs>li>a:focus,
    .advertisement-v6 .view-head .tab-button .nav-tabs>li.active>a,
    .advertisement-v6 .view-head .view-as a:hover,
    .advertisement-v6 .view-head .view-as a.active,
    .locations .location-content-v2 .location h5 a:hover,
    .locations .location-content-v3 .location .location-content h5 a:hover,
    .locations .location-content-v5 ul li .location-content h5 a:hover,
    .locations .location-content-v6 figure.location figcaption .location-caption>a,
    .pricing-plan-v4 .pricing-plan-content .pricing-plan-box .pricing-plan-heading .price-title,
    .pricing-plan-v5 .pricing-plan-content .pricing-plan-box .pricing-plan-text ul li i,
    .pricing-plan-v5 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-button h3,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box .pricing-plan-button .btn,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-button .btn:hover,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular .pricing-plan-heading h2,
    footer .widget-box .widget-content .footer-pr-widget-v1 .media-body h4 a:hover,
    footer .widget-box .widget-content .footer-pr-widget-v1 .media-body span.category a:hover,
    footer .widget-box .widget-content .footer-pr-widget-v2 .media-body h5 a:hover,
    footer .widget-box .widget-content ul li h5 a:hover,
    footer .widget-box .widget-content ul li p span a:hover,
    footer .widget-box .widget-content .category>li>a:hover,
    footer .widget-box>ul>li a:hover,
    footer .widget-box>ul>li a:focus,
    footer .widgetContent .cats ul>li a:hover,
    footer footer .widgetContent .cats>ul>li a:focus,
    .blog-post-section .blog-post .blog-post-content h4 a:hover,
    .blog-post-section .blog-post .blog-post-content p span a:hover,
    .sidebar .widget-box .widget-title h4 i,
    .sidebar .widget-box .widget-content .footer-pr-widget-v1 .media-body h4 a:hover,
    .sidebar .widget-box .widget-content .footer-pr-widget-v1 .media-body .category a:hover,
    .sidebar .widget-box .widget-content .footer-pr-widget-v2 .media-body h5 a:hover,
    .sidebar .widget-box .widget-content ul li h5 a:hover,
    .sidebar .widget-box .widget-content ul li p span a:hover,
    .sidebar .widget-box .widget-content ul li>a:hover,
    .sidebar .widget-box .user-make-offer-message .nav>li>a,
    .sidebar .widget-box .user-make-offer-message .nav>li .browse-favourite a,
    .sidebar .widget-box .user-make-offer-message .nav>li.btnWatch button,
    .sidebar .widget-box .user-make-offer-message .nav>li>a i,
    .sidebar .widget-box .user-make-offer-message .nav>li.btnWatch button i,
    .sidebar .widget-box .user-make-offer-message .nav>li .browse-favourite a i,
    .sidebar .widget-box>ul>li>a:hover,
    .sidebar .widget-box>ul>li>a:focus,
    .sidebar .widgetBox .widgetContent .cats ul>li>a:hover,
    .sidebar .widget-box .widgetContent .cats ul>li>a:focus,
    .sidebar .widget-box .menu-all-pages-container ul li a:hover,
    .sidebar .widget-box .menu-all-pages-container ul li a:focus,
    .inner-page-content .breadcrumb>li a:hover,
    .inner-page-content .breadcrumb>li a:hover i,
    .inner-page-content .breadcrumb>li.active,
    .inner-page-content article.article-content.blog h3 a:hover,
    .inner-page-content article.article-content.blog p span a:hover,
    .inner-page-content article.article-content.blog .tags a:hover,
    .inner-page-content article.article-content blockquote:before,
    .inner-page-content article.article-content ul li:before,
    .inner-page-content article.article-content ol li a,
    .inner-page-content .login-register.login-register-v1 form .form-group p a:hover,
    .author-box .author-contact-details .contact-detail-row .contact-detail-col span a:hover,
    .author-info .media-heading a:hover,
    .author-info span i,
    .user-pages .user-detail-section .user-contact-details ul li a:hover,
    .user-pages .user-detail-section .user-ads .media .media-body .media-heading a:hover,
    .user-pages .user-detail-section .user-ads .media .media-body p span a:hover,
    .user-pages .user-detail-section .user-ads .media .media-body p span.published i,
    .user-pages .user-detail-section .user-packages .table tr td.text-success,
    form .search-form .search-form-main-heading a i,
    form .search-form #innerSearch .inner-search-box .inner-search-heading i,
    .submit-post form .form-main-section .classiera-dropzone-heading i,
    .submit-post form .form-main-section .iframe .iframe-heading i,
    .single-post-page .single-post .single-post-title .post-category span a:hover,
    .single-post-page .single-post .description p a,
    .single-post-page .single-post>.author-info a:hover,
    .single-post-page .single-post>.author-info .contact-details .fa-ul li a:hover,
    .classiera_follow_user>input[type='submit'],
    .single-post .description ul li:before,
    .single-post .description ol li a,
    .mobile-app-button li a i,
    #wp-calendar td#today,
    td#prev a:hover,
    td#next a:hover,
    td#prev a:focus,
    td#next a:focus,
    .classiera-navbar.classiera-navbar-v2 .category-menu-dropdown .category-menu-btn:hover span i,
    .classiera-navbar.classiera-navbar-v2 .category-menu-dropdown.open .category-menu-btn span i,
    .classiera-navbar.classiera-navbar-v2 .category-menu-dropdown .dropdown-menu li a:hover,
    .classiera-navbar.classiera-navbar-v2 .navbar-default .navbar-nav>li>a:hover,
    .classiera-navbar.classiera-navbar-v2 .navbar-default .navbar-nav>.active>a,
    .classiera-navbar.classiera-navbar-v4 .dropdown-menu>li>a:hover,
    .classiera-navbar.classiera-navbar-v4 .dropdown-menu>li>a:hover i,
    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .menu-btn i,
    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .navbar-nav li.active>a,
    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .navbar-nav li>a:hover,
    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .login-reg .lr-with-icon:hover,
    .offcanvas-light .navmenu-brand .offcanvas-button i,
    .offcanvas-light .nav>li>a:hover,
    .offcanvas-light .nav>li>a:focus,
    .offcanvas-light .navmenu-nav>.open>a,
    .offcanvas-light .navmenu-nav .open .dropdown-menu>li>a:hover,
    .offcanvas-light .navmenu-nav .open .dropdown-menu>li>a:focus,
    .offcanvas-light .navmenu-nav .open .dropdown-menu>li>a:active,
    .btn-primary.btn-style-six:hover,
    .btn-primary.btn-style-six.active,
    input[type=radio]:checked+label:before,
    input[type='checkbox']:checked+label:before,
    .woocommerce-info::before,
    .woocommerce .woocommerce-info a:hover,
    .woocommerce .woocommerce-info a:focus,
    #ad-address span a:hover,
    #ad-address span a:focus,
    #getLocation:hover i,
    #getLocation:focus i,
    .offcanvas-light .nav>li.active>a,
    .classiera-box-div-v4 figure figcaption h5 a:hover,
    .classiera-box-div-v4 figure figcaption h5 a:focus,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular h1,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-button .btn.round:hover,
    .color,
    .classiera-box-div.classiera-box-div-v7 .buy-sale-tag,
    .offcanvas-light .nav>li.dropdown ul.dropdown-menu li.active>a,
    .classiera-navbar.classiera-navbar-v4 ul.nav li.dropdown ul.dropdown-menu>li.active>a,
    .classiera-navbar-v6 .offcanvas-light ul.nav li.dropdown ul.dropdown-menu>li.active>a,
    .sidebar .widget-box .author-info a:hover,
    .submit-post form .classiera-post-sub-cat ul li a:focus,
    .submit-post form .classiera_third_level_cat ul li a:focus,
    .woocommerce div.product p.price ins,
    p.classiera_map_div__price span,
    .author-info .media-heading i,
    .classiera-category-new .navText a i:hover,
    footer .widget-box .contact-info .contact-info-box i,
    .classiera-category-new-v2.classiera-category-new-v3 .classiera-category-new-v2-box:hover .classiera-category-new-v2-box-title,
    .minimal_page_search_form .input-group-addon i {
      color: #D32323 !important;
    }

    .pricing-plan-v2 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-heading {
      background: rgba(211, 35, 35, .75)
    }

    .pricing-plan-v2 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-heading::after {
      border-top-color: rgba(211, 35, 35, .75)
    }

    footer .widget-box .widget-content .grid-view-pr li span .hover-posts {
      background: rgba(211, 35, 35, .5)
    }

    .advertisement-v1 .tab-button .nav-tabs>li.active>a,
    .advertisement-v1 .tab-button .nav-tabs>li.active>a:hover,
    .advertisement-v1 .tab-button .nav-tabs>li.active>a:focus,
    .advertisement-v1 .tab-button .nav>li>a:hover,
    .advertisement-v1 .tab-button .nav>li>a:focus,
    form .search-form #innerSearch .inner-search-box .slider-handle,
    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:first-of-type:hover i {
      background-color: #D32323 !important;
    }

    .search-section .search-form.search-form-v1 .form-group button:hover,
    .search-section.search-section-v5 .form-group button,
    .search-section.search-section-v5 .form-group button:hover,
    .search-section.search-section-v6 .form-v6-bg .form-group button,
    .advertisement-v1 .tab-button .nav-tabs>li.active>a,
    .advertisement-v1 .tab-button .nav-tabs>li.active>a:hover,
    .advertisement-v1 .tab-button .nav-tabs>li.active>a:focus,
    .advertisement-v1 .tab-button .nav>li>a:hover,
    .advertisement-v1 .tab-button .nav>li>a:focus,
    .advertisement-v1 .tab-divs .view-as a:hover,
    .advertisement-v1 .tab-divs .view-as a.active,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li>a:hover,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li>a:active,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li>a:focus,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li.active>a,
    .members-v3 .members-text .btn.outline:hover,
    .members-v4.members-v5 .member-content a.btn:hover,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box .pricing-plan-button .btn:hover,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box .pricing-plan-button .btn:focus,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular .pricing-plan-heading,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular .pricing-plan-text,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular .pricing-plan-button .btn,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular .pricing-plan-button .btn:hover,
    .sidebar .widget-box .user-make-offer-message .nav>li>a,
    .sidebar .widget-box .user-make-offer-message .nav>li .browse-favourite a,
    .sidebar .widget-box .user-make-offer-message .nav>li.btnWatch button,
    .user-pages aside .user-submit-ad .btn-user-submit-ad:hover,
    .user-pages .user-detail-section .user-ads.follower .media .media-body>.classiera_follow_user input[type='submit']:hover,
    .user-pages .user-detail-section .user-ads.follower .media .media-body>.classiera_follow_user input[type='submit']:focus,
    .submit-post form .form-main-section .active-post-type .post-type-box,
    .submit-post form .classiera-post-main-cat ul li a:hover,
    .submit-post form .classiera-post-main-cat ul li a:focus,
    .submit-post form .classiera-post-main-cat ul li.active a,
    .classiera-upload-box.classiera_featured_box,
    .classiera_follow_user>input[type='submit'],
    .related-blog-post-section .navText a:hover,
    .pagination>li>a:hover,
    .pagination>li span:hover,
    .pagination>li:first-child>a:hover,
    .pagination>li:first-child span:hover,
    .pagination>li:last-child>a:hover,
    .pagination>li:last-child span:hover,
    .classiera-navbar.classiera-navbar-v1 .betube-search .btn.outline:hover,
    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:first-of-type:hover i,
    .classiera-navbar.classiera-navbar-v6 .dropdown .dropdown-menu,
    .offcanvas-light .navmenu-brand .offcanvas-button,
    .offcanvas-light .log-reg-btn .offcanvas-log-reg-btn:hover,
    .btn-primary.outline:hover,
    .btn-primary.outline:focus,
    .btn-primary.outline:active,
    .btn-primary.outline.active,
    .open>.dropdown-toggle.btn-primary,
    .btn-primary.outline:active,
    .btn-primary.outline.active,
    .btn-style-four.active,
    .btn-style-four.active:hover,
    .btn-style-four.active:focus,
    .btn-style-four.active:active,
    .btn-style-four:hover,
    .btn-style-four:focus,
    .btn-style-four:active,
    #showNum:hover,
    .user_inbox_content>.tab-content .tab-pane .nav-tabs>li.active>a,
    .nav-tabs>li.active>a:hover,
    .nav-tabs>li.active>a:focus,
    .classiera-navbar.classiera-navbar-v5.classiera-navbar-minimal .custom-menu-v5 .menu-btn {
      border-color: #D32323 !important;
    }

    .advertisement-v4 .view-head .tab-button .nav-tabs>li>a span.arrow-down,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li:hover:after,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li.active:after,
    .locations .location-content .location .location-icon .tip,
    .classiera-navbar.classiera-navbar-v2 .category-menu-dropdown .dropdown-menu,
    .classiera-navbar.classiera-navbar-v2 .navbar-default .navbar-nav>li>.dropdown-menu,
    .classiera-navbar.classiera-navbar-v4 .dropdown-menu,
    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .navbar-nav .dropdown-menu,
    .woocommerce-error,
    .woocommerce-info,
    .woocommerce-message {
      border-top-color: #D32323;
    }

    .locations .location-content-v2 .location:hover,
    .classiera-navbar.classiera-navbar-v2 .category-menu-dropdown .dropdown-menu:before,
    .classiera-navbar.classiera-navbar-v2 .navbar-default .navbar-nav>li>a:hover,
    .classiera-navbar.classiera-navbar-v2 .navbar-default .navbar-nav>li>.dropdown-menu:before,
    .classiera-navbar.classiera-navbar-v2 .navbar-default .navbar-nav>.active>a {
      border-bottom-color: #D32323 !important;
    }

    .pagination>li.active a,
    .pagination>li.disabled a,
    .pagination>li.active a:focus,
    .pagination>li.active a:hover,
    .pagination>li.disabled a:focus,
    .pagination>li.disabled a:hover,
    .pagination>li:first-child>a,
    .pagination>li:first-child span,
    .pagination>li:last-child>a,
    .pagination>li:last-child span,
    .classiera-navbar.classiera-navbar-v3.affix,
    .classiera-navbar.classiera-navbar-v3 .navbar-nav>li>.dropdown-menu li a:hover,
    .classiera-navbar.classiera-navbar-v4 .dropdown-menu>li>a:hover,
    .classiera-navbar.classiera-navbar-v6 .dropdown .dropdown-menu>li>a:hover,
    .classiera-navbar.classiera-navbar-v6 .dropdown .dropdown-menu>li>a:focus,
    .btn-primary,
    .btn-primary.btn-style-five:hover,
    .btn-primary.btn-style-five.active,
    .btn-primary.btn-style-six:hover,
    .btn-primary.btn-style-six.active,
    .input-group-addon,
    .woocommerce .button,
    .woocommerce a.button,
    .woocommerce .button.alt,
    .woocommerce #respond input#submit.alt,
    .woocommerce a.button.alt,
    .woocommerce button.button.alt,
    .woocommerce input.button.alt,
    #ad-address span i,
    .search-section .search-form .form-group .help-block,
    .search-section .search-form.search-form-v1 .form-group button,
    .search-section.search-section-v2 .form-group button,
    .search-section.search-section-v4 .search-form .btn:hover,
    .category-slider-small-box ul li a,
    .category-slider-small-box.outline-box ul li a:hover,
    .classiera-premium-ads-v3 .premium-carousel-v3 .owl-dots .owl-dot.active span,
    .classiera-premium-ads-v3 .premium-carousel-v3 .owl-dots .owl-dot:hover span,
    .classiera-box-div-v7 figure:hover:after,
    .category-v2 .category-box .category-content ul li a:hover i,
    .category-v6 .category-box figure .category-box-hover>span,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v3 figure figcaption .price span:last-of-type,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v5 figure .detail .box-icon a:hover,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v6 figure .detail .box-icon a:hover,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v7 figure .detail .box-icon a:hover,
    .advertisement-v1 .tab-button .nav-tabs>li>a,
    .advertisement-v5 .view-head .tab-button .nav-tabs>li>a:hover,
    .advertisement-v5 .view-head .tab-button .nav-tabs>li>a:active,
    .advertisement-v5 .view-head .tab-button .nav-tabs>li>a:focus,
    .advertisement-v5 .view-head .tab-button .nav-tabs>li.active>a,
    .advertisement-v5 .view-head .view-as a:hover,
    .advertisement-v5 .view-head .view-as a.active,
    .advertisement-v6 .view-head .tab-button .nav-tabs>li>a:hover,
    .advertisement-v6 .view-head .tab-button .nav-tabs>li>a:active,
    .advertisement-v6 .view-head .tab-button .nav-tabs>li>a:focus,
    .advertisement-v6 .view-head .tab-button .nav-tabs>li.active>a,
    .advertisement-v6 .view-head .view-as a:hover,
    .advertisement-v6 .view-head .view-as a.active,
    .locations .location-content .location:hover,
    .call-to-action .call-to-action-box .action-box-heading .heading-content i,
    .pricing-plan-v2 .pricing-plan-content .pricing-plan-box .pricing-plan-price,
    .pricing-plan-v5 .pricing-plan-content .pricing-plan-box .pricing-plan-heading,
    .pricing-plan-v6,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box .pricing-plan-button .btn,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-button .btn:hover,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular,
    .partners-v3 .partner-carousel-v3 .owl-dots .owl-dot.active span,
    .partners-v3 .partner-carousel-v3 .owl-dots .owl-dot:hover span,
    #back-to-top,
    .custom-wp-search .btn-wp-search,
    .single-post-page .single-post #single-post-carousel .single-post-carousel-controls .carousel-control span,
    #ad-address span i,
    .classiera-navbar.classiera-navbar-v4 ul.nav li.dropdown ul.dropdown-menu>li.active>a,
    .classiera-navbar.classiera-navbar-v6 ul.nav li.dropdown ul.dropdown-menu>li.active>a,
    #showNum {
      background: #232323;
    }

    .classiera-navbar.classiera-navbar-v6 {
      background-color: rgba(35, 35, 35, 0.08) !important
    }

    .pricing-plan-v2 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-heading::after {
      border-top-color: rgba(211, 35, 35, .75)
    }

    h1>a,
    h2>a,
    h3>a,
    h4>a,
    h5>a,
    h6>a,
    .classiera-navbar.classiera-navbar-v1 .navbar-default .navbar-nav>li>a,
    .classiera-navbar.classiera-navbar-v1 .navbar-default .navbar-nav>.active>a,
    .classiera-navbar.classiera-navbar-v1 .navbar-default .navbar-nav>.active>a:hover,
    .classiera-navbar.classiera-navbar-v1 .navbar-default .navbar-nav>.active>a:focus,
    .classiera-navbar.classiera-navbar-v1 .dropdown-menu>li>a:hover,
    .classiera-navbar.classiera-navbar-v2 .category-menu-dropdown .category-menu-btn,
    .classiera-navbar.classiera-navbar-v2 .category-menu-dropdown .dropdown-menu li a,
    .classiera-navbar.classiera-navbar-v2 .navbar-default .navbar-nav>li>.dropdown-menu>li>a,
    .classiera-navbar.classiera-navbar-v4 .navbar-nav>li>a:hover,
    .classiera-navbar.classiera-navbar-v4 .navbar-nav>li>a:focus,
    .classiera-navbar.classiera-navbar-v4 .navbar-nav>li>a:link,
    .classiera-navbar.classiera-navbar-v4 .navbar-nav>.active>a,
    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .navbar-nav li>a,
    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .navbar-nav .dropdown-menu li>a,
    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .login-reg .lr-with-icon,
    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:first-of-type:hover i,
    .classiera-navbar.classiera-navbar-v6 .dropdown .dropdown-menu>li>a,
    .classiera-navbar.classiera-navbar-v6 .dropdown .dropdown-menu>li>a i,
    .btn-primary.outline,
    .radio label a,
    .checkbox label a,
    #getLocation,
    .search-section.search-section-v6 .form-v6-bg .form-group button,
    .category-slider-small-box ul li a:hover,
    .category-slider-small-box.outline-box ul li a,
    .classiera-static-slider-v2 .classiera-static-slider-content h1,
    .classiera-static-slider-v2 .classiera-static-slider-content h2,
    .classiera-static-slider-v2 .classiera-static-slider-content h2 span,
    .section-heading-v5 h3,
    .section-heading-v6 h3,
    .classiera-premium-ads-v3 .premium-carousel-v3 .item figure figcaption .price,
    .classiera-premium-ads-v3 .premium-carousel-v3 .item figure figcaption .price span:last-of-type,
    .classiera-premium-ads-v3 .premium-carousel-v3 .item figure figcaption h5 a,
    .classiera-premium-ads-v3 .navText a i,
    .classiera-premium-ads-v3 .navText span,
    .classiera-box-div-v1 figure figcaption h5 a,
    .classiera-box-div-v1 figure figcaption p a:hover,
    .classiera-box-div-v2 figure figcaption h5 a,
    .classiera-box-div-v3 figure figcaption .price,
    .classiera-box-div-v3 figure figcaption .price span:last-of-type,
    .classiera-box-div-v3 figure figcaption h5 a,
    .classiera-box-div-v4 figure figcaption h5 a,
    .classiera-box-div-v5 figure figcaption h5 a,
    .classiera-box-div-v6 figure .premium-img .price.btn-primary.active,
    .classiera-box-div-v7 figure figcaption .caption-tags .price,
    .classiera-box-div-v7 figure figcaption .content h5 a,
    .classiera-box-div-v7 figure figcaption .content>a,
    .classiera-box-div-v7 figure:hover figcaption .content .category span,
    .classiera-box-div-v7 figure:hover figcaption .content .category span a,
    .category-v1 .category-box .category-content ul li a:hover,
    .category-v2 .category-box .category-content .view-button a,
    .category-v3 .category-content h4 a,
    .category-v3 .category-content .view-all,
    menu-category .navbar-header .navbar-brand,
    .menu-category .navbar-nav>li>a:hover,
    .menu-category .navbar-nav>li>a:active,
    .menu-category .navbar-nav>li>a:focus,
    .menu-category .dropdown-menu li a:hover,
    .category-v5 .categories li,
    .category-v5 .categories li .category-content h4 a,
    .category-v6 .category-box figure figcaption>span i,
    .category-v6 .category-box figure .category-box-hover h3 a,
    .category-v6 .category-box figure .category-box-hover p,
    .category-v6 .category-box figure .category-box-hover ul li a,
    .category-v6 .category-box figure .category-box-hover>a,
    .category-v7 .category-box figure .cat-img .cat-icon i,
    .category-v7 .category-box figure figcaption h4 a,
    .category-v7 .category-box figure figcaption>a,
    .classiera-advertisement .item.item-list .classiera-box-div figure figcaption .post-tags span,
    .classiera-advertisement .item.item-list .classiera-box-div figure figcaption .post-tags a:hover,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v5 figure .detail .box-icon a,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v6 figure figcaption .content h5 a,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v6 figure .detail .price.btn-primary.active,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v6 figure .detail .box-icon a,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v7 figure figcaption .content h5 a,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v7 figure .detail .price.btn-primary.active,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v7 figure .detail .box-icon a,
    .advertisement-v4 .view-head .tab-button .nav-tabs>li>span,
    .advertisement-v5 .view-head .tab-button .nav-tabs>li>a,
    .advertisement-v5 .view-head .view-as a,
    .advertisement-v6 .view-head .tab-button .nav-tabs>li>a,
    .advertisement-v6 .view-head .view-as a,
    .members-v2 .members-text h1,
    .members-v4 .member-content p,
    .locations .location-content .location a .loc-head,
    .locations .location-content-v2 .location h5 a,
    .locations .location-content-v3 .location .location-content h5 a,
    .locations .location-content-v5 ul li .location-content h5 a,
    .locations .location-content-v6 figure.location figcaption .location-caption span i,
    .pricing-plan-v4 .pricing-plan-content .pricing-plan-box.popular ul li,
    .pricing-plan-v5 .pricing-plan-content .pricing-plan-box .pricing-plan-button h3 small,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box .pricing-plan-button h4,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box .pricing-plan-button .btn:hover,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box .pricing-plan-button .btn:focus,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular .pricing-plan-button .btn,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular .pricing-plan-button .btn:hover,
    .partners-v3 .navText a i,
    .partners-v3 .navText span,
    footer .widget-box .widget-content .grid-view-pr li span .hover-posts span,
    .blog-post-section .blog-post .blog-post-content h4 a,
    .sidebar .widget-box .widget-title h4,
    .sidebar .widget-box .widget-content .footer-pr-widget-v1 .media-body h4 a,
    .sidebar .widget-box .widget-content .footer-pr-widget-v2 .media-body h5 a,
    .sidebar .widget-box .widget-content .grid-view-pr li span .hover-posts span,
    .sidebar .widget-box .widget-content ul li h5 a,
    .sidebar .widget-box .contact-info .contact-info-box i,
    .sidebar .widget-box .contact-info .contact-info-box p,
    .sidebar .widget-box .author-info a,
    .sidebar .widget-box .user-make-offer-message .tab-content form label,
    .sidebar .widget-box .user-make-offer-message .tab-content form .form-control-static,
    .inner-page-content article.article-content.blog h3 a,
    .inner-page-content article.article-content.blog .tags>span,
    .inner-page-content .login-register .social-login.social-login-or:after,
    .inner-page-content .login-register.login-register-v1 .single-label label,
    .inner-page-content .login-register.login-register-v1 form .form-group p a,
    .border-section .user-comments .media .media-body p+h5 a:hover,
    .author-box .author-desc p strong,
    .author-info span.offline i,
    .user-pages aside .user-submit-ad .btn-user-submit-ad,
    .user-pages .user-detail-section .about-me p strong,
    .user-pages .user-detail-section .user-ads .media .media-body .media-heading a,
    form .search-form .search-form-main-heading a,
    form .search-form #innerSearch .inner-search-box input[type='checkbox']:checked+label::before,
    form .search-form #innerSearch .inner-search-box p,
    .submit-post form .form-main-section .classiera-image-upload .classiera-image-box .classiera-upload-box .classiera-image-preview span i,
    .submit-post form .terms-use a,
    .submit-post.submit-post-v2 form .form-group label.control-label,
    .single-post-page .single-post .single-post-title>.post-price>h4,
    .single-post-page .single-post .single-post-title h4 a,
    .single-post-page .single-post .details .post-details ul li p,
    .single-post-page .single-post .description .tags span,
    .single-post-page .single-post .description .tags a:hover,
    .single-post-page .single-post>.author-info a,
    .classieraAjaxInput .classieraAjaxResult ul li a,
    .pricing-plan-v4 .pricing-plan-content .pricing-plan-box.popular .price-title,
    .category-box-v8 h4,
    .classiera-category-new .navText a i,
    .locations .section-heading-v1 h3.text-uppercase {
      color: #232323;
    }

    .pagination>li.active a,
    .pagination>li.disabled a,
    .pagination>li.active a:focus,
    .pagination>li.active a:hover,
    .pagination>li.disabled a:focus,
    .pagination>li.disabled a:hover,
    .pagination>li:first-child>a,
    .pagination>li:first-child span,
    .pagination>li:last-child>a,
    .pagination>li:last-child span,
    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .menu-btn,
    .btn-primary.outline,
    .btn-primary.btn-style-five:hover,
    .btn-primary.btn-style-five.active,
    .btn-primary.btn-style-six:hover,
    .btn-primary.btn-style-six.active,
    .input-group-addon,
    .search-section .search-form.search-form-v1 .form-group button,
    .category-slider-small-box.outline-box ul li a,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v5 figure .detail .box-icon a,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v6 figure .detail .box-icon a,
    .classiera-advertisement .item.item-list .classiera-box-div.classiera-box-div-v7 figure .detail .box-icon a,
    .advertisement-v5 .view-head .tab-button .nav-tabs>li>a,
    .advertisement-v5 .view-head .view-as a,
    .advertisement-v5 .view-head .view-as a:hover,
    .advertisement-v5 .view-head .view-as a.active,
    .advertisement-v6 .view-head .tab-button .nav-tabs>li>a,
    .advertisement-v6 .view-head .view-as a,
    .advertisement-v6 .view-head .view-as a:hover,
    .advertisement-v6 .view-head .view-as a.active,
    .locations .location-content .location:hover,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-heading,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-text,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-button .btn:hover,
    .user-pages .user-detail-section .user-ads.follower .media .media-body>.classiera_follow_user input[type='submit'],
    #showNum {
      border-color: #232323;
    }

    .classiera-navbar.classiera-navbar-v1 .dropdown-menu {
      border-top-color: #232323;
    }

    .search-section .search-form .form-group .help-block ul::before {
      border-bottom-color: #232323;
    }

    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .navbar-nav .dropdown-menu li>a:hover,
    .classiera-navbar.classiera-navbar-v5 .custom-menu-v5 .navbar-nav .dropdown-menu li>a:focus,
    .search-section.search-section-v5 .form-group .input-group-addon i,
    .classiera-box-div-v6 figure .premium-img .price.btn-primary.active,
    .classiera-box-div-v7 figure figcaption .caption-tags .price,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular .pricing-plan-button .btn:hover,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular .pricing-plan-button .btn,
    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:first-of-type:hover i,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box .pricing-plan-button .btn.round:hover,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-content .pricing-plan-box .pricing-plan-button .btn:hover,
    .pricing-plan-v4 .pricing-plan-content .pricing-plan-box.popular .price-title,
    .classiera-box-div .btn-primary.btn-style-six.active {
      color: #232323 !important;
    }

    .btn-primary.btn-style-six:hover,
    .btn-primary.btn-style-six.active,
    .pricing-plan-v6.pricing-plan-v7 .pricing-plan-box.popular,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-button .btn.round:hover,
    .classiera-navbar.classiera-navbar-v3 ul.navbar-nav li.dropdown ul.dropdown-menu>li.active>a,
    .search-section.search-section-v2 .form-group button:hover {
      background: #232323 !important;
    }

    .btn-primary.btn-style-six:hover,
    .pricing-plan-v6 .pricing-plan-content .pricing-plan-box.popular .pricing-plan-button .btn.round:hover {
      border-color: #232323 !important;
    }

    .classiera-box-div-v6 figure .box-div-heading {
      background: -webkit-linear-gradient(bottom, rgba(255, 255, 255, 0.1) 2%, rgba(20, 49, 57, 0.9) 20%);
      background: -o-linear-gradient(bottom, rgba(255, 255, 255, 0.1) 2%, rgba(20, 49, 57, 0.9) 20%);
      background: -moz-linear-gradient(bottom, rgba(255, 255, 255, 0.1) 2%, rgba(20, 49, 57, 0.9) 20%);
      background: linear-gradient(to bottom, rgba(255, 255, 255, 0.1) 2%, rgba(20, 49, 57, 0.9) 20%);
    }

    .home .classiera-navbar.classiera-navbar-v6 {
      position: absolute
    }

    .topBar,
    .topBar.topBar-v3 {
      background: #444444;
    }

    .topBar.topBar-v4 .contact-info ul li,
    .topBar.topBar-v4 .contact-info ul li:last-of-type span,
    .topBar.topBar-v4 .follow ul span,
    .topBar.topBar-v4 .follow ul li a,
    .topBar.topBar-v3 p,
    .topBar.topBar-v3 p span,
    .topBar.topBar-v3 .login-info a {
      color: #FFFFFF;
    }

    .classiera-navbar.classiera-navbar-v2,
    .classiera-navbar.classiera-navbar-v2 .navbar-default,
    .classiera-navbar.classiera-navbar-v3,
    .classiera-navbar.classiera-navbar-v3.affix,
    .home .classiera-navbar.classiera-navbar-v6,
    .classiera-navbar-v5.classiera-navbar-minimal {
      background: transparent !important;
    }

    .classiera-navbar.classiera-navbar-v2 .navbar-default .navbar-nav>li>a,
    .classiera-navbar.classiera-navbar-v3 .nav>li>a,
    .classiera-navbar.classiera-navbar-v6 .navbar-default .navbar-nav>li>a,
    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:first-of-type,
    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:first-of-type i {
      color: #FFFFFF !important;
    }

    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:first-of-type i {
      border-color: #FFFFFF !important;
    }

    .classiera-navbar.classiera-navbar-v6 {
      background-color: rgba(68, 68, 68, 1) !important
    }

    .featured-tag .right-corner,
    .featured-tag .left-corner,
    .classiera-box-div-v7 figure .featured,
    .classiera-box-div-v6 figure .featured {
      background-color: #017FB1 !important;
    }

    .featured-tag .featured {
      border-bottom-color: #03B0F4 !important;
    }

    footer.section-bg-black,
    .minimal_footer {
      background: #FAFAFA !important;
    }

    footer .widget-box .widget-title h4 {
      color: #D32323 !important;
    }

    footer .widget-box .tagcloud a {
      background: #444444 !important;
    }

    footer .widget-box .tagcloud a,
    footer .widget-box ul.menu li a,
    footer .widget-box ul.menu li,
    footer .textwidget a {
      color: #FFFFFF !important;
    }

    footer .widget-box .tagcloud a:hover,
    footer .widget-box ul.menu li a:hover,
    footer .widget-box ul.menu li:hover,
    footer .textwidget a:hover {
      color: #FFFFFF !important;
    }

    .footer-bottom,
    .minimal_footer_bottom {
      background: #D32323 !important;
    }

    .footer-bottom p,
    .footer-bottom p a,
    .footer-bottom ul.footer-bottom-social-icon span,
    .minimal_footer_bottom p {
      color: #FFFFFF !important;
    }

    .members-v1 .members-text h2.callout_title,
    .members-v4 .member-content h3,
    .members-v4 .member-content ul li,
    .members-v4.members-v5 .member-content ul li span,
    .members-v4.members-v5 .member-content h3,
    .members-v4.members-v5 .member-content a.btn:hover,
    .members-v4.members-v5 .member-content a.btn,
    .members-v4.section-bg-light-img .member-content a.btn-style-six,
    .members-v3 .members-text h1,
    .members .members-text h2 {
      color: #D32323 !important;
    }

    .members-v4 .member-content ul li span,
    .members-v4.members-v5 .member-content ul li span,
    .members-v4.members-v5 .member-content a.btn:hover,
    .members-v4.members-v5 .member-content a.btn,
    .members-v4.section-bg-light-img .member-content a.btn-style-six,
    section.members-v3 .members-text a.btn {
      border-color: #D32323 !important;
    }

    .members-v1 .members-text h2.callout_title_second,
    .members-v4 .member-content h4,
    .members-v4.members-v5 .member-content h4,
    .members-v3 .members-text h2,
    section.members-v3 .members-text a.btn {
      color: #232323 !important;
    }

    .members-v1 .members-text p,
    .members-v4 .member-content p,
    .members-v3 .members-text p,
    .members .members-text p {
      color: #7C7C7C !important;
    }

    footer .widget-box .textwidget,
    footer .widget-box .contact-info .contact-info-box p {
      color: #7C7C7C !important;
    }

    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:last-of-type,
    .classiera-navbar.classiera-navbar-v1 .betube-search .btn.outline,
    .classiera-navbar.classiera-navbar-v1 .betube-search .btn.outline i,
    .topBar-v2-icons a.btn-style-two,
    .betube-search .btn-style-three,
    .betube-search .btn-style-four,
    .custom-menu-v5 a.btn-submit {
      color: #D32323;
    }

    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:last-of-type {
      border-color: #D32323 !important;
    }

    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:last-of-type:hover,
    .classiera-navbar.classiera-navbar-v1 .betube-search .btn.outline:hover,
    .classiera-navbar.classiera-navbar-v1 .betube-search .btn.outline:hover i,
    .topBar-v2-icons a.btn-style-two:hover,
    .topBar-v2-icons a.btn-style-two:hover i,
    .betube-search .btn-style-three:hover,
    .betube-search .btn-style-four:hover,
    .custom-menu-v5 a.btn-submit:hover {
      color: #FFFFFF;
    }

    .classiera-navbar.classiera-navbar-v6 .navbar-default .login-reg a:last-of-type:hover {
      border-color: #FFFFFF !important;
    }

    section.classiera-static-slider,
    section.classiera-static-slider-v2,
    section.classiera-simple-bg-slider {
      background-color: #fff !important;
      background-image: url("../wp-content/uploads/2021/12/Background.png");
      background-repeat: no-repeat;
      background-position: center bottom;
      background-size: cover;

    }

    section.classiera-static-slider .classiera-static-slider-content h1,
    section.classiera-static-slider-v2 .classiera-static-slider-content h1,
    section.classiera-simple-bg-slider .classiera-simple-bg-slider-content h1 {
      color: #ffffff;
      font-size: 40px;
      font-family: Quicksand !important;
      font-weight: 700;
      line-height: 40px;

    }

    section.classiera-static-slider .classiera-static-slider-content h2,
    section.classiera-static-slider-v2 .classiera-static-slider-content h2,
    section.classiera-simple-bg-slider .classiera-simple-bg-slider-content h4 {
      color: #ffffff;
      font-size: 24px;
      font-family: Quicksand !important;
      font-weight: 400;
      line-height: 24px;

    }
  </style> <noscript>
    <style>
      .woocommerce-product-gallery {
        opacity: 1 !important;
      }
    </style>
  </noscript>
  <meta name="generator" content="Elementor 3.11.2; features: e_dom_optimization, e_optimized_assets_loading, e_optimized_css_loading, a11y_improvements, additional_custom_breakpoints; settings: css_print_method-external, google_font-enabled, font_display-auto">
  <style id="redux_demo-dynamic-css" title="dynamic-css" class="redux-options-output">
    h1,
    h1 a {
      font-family: Quicksand;
      line-height: 36px;
      font-weight: 700;
      font-style: normal;
      color: #232323;
      font-size: 36px;
      font-display: swap;
    }

    h2,
    h2 a,
    h2 span {
      font-family: Quicksand;
      line-height: 30px;
      font-weight: 700;
      font-style: normal;
      color: #232323;
      font-size: 30px;
      font-display: swap;
    }

    h3,
    h3 a,
    h3 span {
      font-family: Quicksand;
      line-height: 28px;
      font-weight: 700;
      font-style: normal;
      color: #d32323;
      font-size: 28px;
      font-display: swap;
    }

    h4,
    h4 a,
    h4 span {
      font-family: Quicksand;
      line-height: 18px;
      font-weight: 700;
      font-style: normal;
      color: #232323;
      font-size: 18px;
      font-display: swap;
    }

    h5,
    h5 a,
    h5 span {
      font-family: Quicksand;
      line-height: 14px;
      font-weight: 500;
      font-style: normal;
      color: #232323;
      font-size: 14px;
      font-display: swap;
    }

    h6,
    h6 a,
    h6 span {
      font-family: Quicksand;
      line-height: 24px;
      font-weight: normal;
      font-style: normal;
      color: #232323;
      font-size: 12px;
      font-display: swap;
    }

    html,
    body,
    div,
    applet,
    object,
    iframe p,
    blockquote,
    a,
    abbr,
    acronym,
    address,
    big,
    cite,
    del,
    dfn,
    em,
    img,
    ins,
    kbd,
    q,
    s,
    samp,
    small,
    strike,
    sub,
    sup,
    tt,
    var,
    b,
    u,
    i,
    center,
    dl,
    dt,
    dd,
    ol,
    ul,
    li,
    fieldset,
    form,
    label,
    legend,
    table,
    caption,
    tbody,
    tfoot,
    thead,
    tr,
    th,
    td,
    article,
    aside,
    canvas,
    details,
    embed,
    figure,
    figcaption,
    footer,
    header,
    hgroup,
    menu,
    nav,
    output,
    ruby,
    section,
    summary,
    time,
    mark,
    audio,
    video,
    .submit-post form .form-group label,
    .submit-post form .form-group .form-control,
    .help-block {
      font-family: Quicksand;
      line-height: 24px;
      font-weight: normal;
      font-style: normal;
      color: #7c7c7c;
      font-size: 14px;
      font-display: swap;
    }
  </style>

  <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css"> -->

  <!-- <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> -->
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>

  <style>
    .table_edit_btn {
      font-weight: lighter !important;
      padding: 0px !important;
      padding-top: 0px !important;
      padding-bottom: 0px !important;
      font-size: 25px !important;
      color: white !important;
      /* background-color: white !important; */
      /* border-color: #007bff !important; */
      margin: 0px !important;
    }

    .table_delete_btn {
      padding-top: 6px !important;
      padding-bottom: 6px !important;
      font-size: 15px !important;
      color: white !important;
      /* background-color: white !important; */
      /* border-color: red !important; */
      margin: 0px !important;
      margin-bottom: 1px !important;
    }



    .table_botton {
      /* margin: 10px !important; */
      /* width: 150px !important; */
      padding: 5px !important;
      /* color:white !important; */
      /* background-color:green !important; */
    }

    .table_botton button {
      font-size: 14px !important;
      margin: 0px !important;
      width: 100% !important;
      padding: 5px !important;
      color: white !important;
      background-color: green !important;
      border-color: green !important;

    }

    .table_label {
      margin: 10px !important;
      width: 150px !important;
      padding: 5px !important;
      border-bottom: 1px solid black;
    }

    .table_botton button:hover {
      /* margin: 10px !important;
            width: 150px !important; */
      /* padding: 5px !important; */
      color: green !important;
      background-color: white !important;
    }

    th {
      font-weight: lighter !important;
      /* color:white !important; */
      background-color: #dce7fc !important;
      margin-right: 1px !important;
    }

    /* table.addlocation {
            table-layout: auto;
            width: 100%;
        } */
    table.d {
      table-layout: fixed;
      width: 100%;
    }

    .tbl_head {
      font-weight: 1000 !important;
      font-size: 15x;
    }

    .table_input {
      margin: 10px !important;
      /* width: 150px !important; */
      padding: 5px !important;
    }

    .table_input input {
      font-size: 14px !important;
      margin: 0px !important;
      width: 100% !important;
      padding: 5px !important;
    }
  </style>

  <style>
    /* The check_container */
    .check_container {
      display: block;
      position: relative;
      padding-left: 35px;
      margin-bottom: 12px;
      cursor: pointer;
      font-size: 22px;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* Hide the browser's default checkbox */
    .check_container input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
    }

    /* Create a custom checkbox */
    .checkmark_for_select {
      position: absolute;
      top: 0;
      left: 0;
      height: 25px;
      width: 25px;
      background-color: #eee;
    }

    /* On mouse-over, add a grey background color */
    .check_container:hover input~.checkmark_for_select {
      background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .check_container input:checked~.checkmark_for_select {
      background-color: #2196F3;
    }

    /* Create the checkmark_for_select/indicator (hidden when not checked) */
    .checkmark_for_select:after {
      content: "";
      position: absolute;
      display: none;
    }

    /* Show the checkmark_for_select when checked */
    .check_container input:checked~.checkmark_for_select:after {
      display: block;
    }

    /* Style the checkmark_for_select/indicator */
    .check_container .checkmark_for_select:after {
      left: 9px;
      top: 5px;
      width: 5px;
      height: 10px;
      border: solid white;
      border-width: 0 3px 3px 0;
      -webkit-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      transform: rotate(45deg);
    }
  </style>
  <!-- preloader -->
  <style>
        #loader {
            border: 12px solid #f3f3f3;
            border-radius: 50%;
            border-top: 12px solid #444444;
            width: 70px;
            height: 70px;
            animation: spin 1s linear infinite;
            z-index: 9999;
        }
 
        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }
 
        .center {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }
    </style>
</head>

<body data-rsssl=1 class="page-template page-template-template-login page-template-template-login-php page page-id-49 theme-classiera woocommerce-no-js single-author elementor-default elementor-kit-1989">
  <div id="loader" class="center"></div>
  <?php include "../navbar/index.php" ?>
  <?php include "../component/registration_count_box.php" ?>

  <div id="showLocatonContent" class="d-flex text-center mt-3 ">
    <h1 class=" my-auto mr-auto d-inline"> All Registrations</h1>
  </div>
  <div id="admin_table" class="container " style="padding-top:15px;padding-bottom:10px;">
    <?php
    // echo"<pre>";
    // var_dump($_SESSION);
    // echo"<pre>";
    ?>
    <div class="table-responsive" style="border:3px solid grey;padding:px;">
      <table data-role="table" class="table ui-responsive datatable  " id="myTable">
        <div id="showEditorOption" style="float:left;display:none !important;" class="d-flex text-center">
          <div class="form-group">
            <button type="" name="submit" onclick="approve_ac_with_checkbox()" style='background-color:green;color:white;padding:5px;font-weight:700;font-size:15px;' class="btn  sharp btn-md btn-style-one" value="Send">Approve</button>
            <button type="" style='background-color:red;color:white;padding:5px;font-weight:700;font-size:15px;' name="submit" class="btn  sharp btn-md btn-style-one" onclick="reject_ac_with_checkbox()" value="Send">Reject</button>
          </div>
        </div>
        <div id="showEditorBtn" style="float:left" class="d-flex text-center">
          <div class="form-group">
            <button type="" onclick="show_checkbox()" name="submit" style='background-color:green;color:white;padding:5px;font-weight:700;font-size:15px;' class="btn  sharp btn-md btn-style-one" value="Send">Edit</button>
          </div>
        </div>

        <thead>
          <tr>
            <th class="checkBoxOption" style="display:none;width: 77px !important;"><input id="check_all" type="checkbox" value="all" style="width: 205px !important;"><label for="check_all"></label></th>
            <th class="tbl_head" scope="col">Sr. No.</th>
            <th class="tbl_head" scope="col">Username </th>
            <th class="tbl_head" scope="col">First Name </th>
            <th class="tbl_head" scope="col">Last Name </th>
            <th class="tbl_head" scope="col">Phone</th>
            <th class="tbl_head" scope="col">Email</th>
            <th class="tbl_head" scope="col">Since</th>
            <th class="tbl_head" scope="col">Status</th>

            <th class="tbl_head" scope="col" style="width:110px;">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $select_user_query = "SELECT * FROM `users_entries` WHERE user_type LIKE 'user' AND is_verified_email = 1 ORDER BY `users_entries`.`user_timestamp` DESC";
          // echo$fname,$lname;
          try {
            $select_user_result = mysqli_query($connect, $select_user_query);
            $num  = mysqli_num_rows($select_user_result);
          } catch (Exception $e) {
            $mess = $e->getMessage();
          }
          if ($num > 0) {
            $sno = 0;
            while ($row = mysqli_fetch_assoc($select_user_result)) {
              $sno += 1;
          ?>
              <tr id="row_<?= $row['user_id'] ?>" class="row_by_id" style="">

                <td style="display:none;padding: 0px 0px;" class="checkBoxOption"><label for="reg_<?= $row["user_id"] ?>" class="check_container">
                    <input type="checkbox" name="row-check" id="reg_<?= $row["user_id"] ?>" value="<?= $row["user_id"] ?>">
                    <span class="checkmark_for_select text-center" style="padding-right:10px !important;width:100%;"></span>
                  </label>
                </td>

                <td><?= $sno ?></td>
                <td><?= $row["user_username"] ?></td>
                <td><?= $row["user_first_name"] ?></td>
                <td><?= $row["user_last_name"] ?></td>
                <td><?= $row["user_phone"] ?></td>
                <td><?= $row["user_email"] ?></td>
                <td><?= $row["user_timestamp"] ?></td>
                <td id="status_<?= $row["user_id"] ?>">
                  <?php
                  if ($row["is_verified_admin"] =="1") {
                    echo "<span style='background-color:green;color:white;padding:5px;font-weight:700;border-radius:5px;'>Approved</span>";
                  } else if ($row["is_verified_admin"] =="2") {
                    echo "<span style='background-color:red;color:white;padding:5px;font-weight:700;border-radius:5px;'>Rejected</span>";
                  } else {
                    echo "<span style='background-color:#f1c40f;color:white;padding:5px;font-weight:700;border-radius:5px;'>Pending</span>";
                  }
                  ?></td>
                <td class="text-center">
                  <span type="button" style="cursor: pointer;width:50px;margin-right:0px;font-size:25px !important;" id="approve_<?= $row["loc_id"] ?>" class="d-inline edit table_edit_btn" data-bs-toggle="modal" data-bs-target="#editModal" onclick="approve_ac(<?= $row['user_id'] ?>)"> ✅</span>
                  <span style="cursor: pointer;width:50px;margin-right:0px;font-size:25px !important;" id="d<?= $row["user_id"] ?>" type="button" id="d" class="d-inline delete table_delete_btn " onclick="reject_ac(<?= $row['user_id'] ?>)"> ❌</span>
                </td>
              </tr>
          <?php
            }
          } else {
            echo "<tr><td class='text-center' colspan='6'>No New Registration Found</td></tr>";
          }
          ?>
        </tbody>
      </table>

    </div>




  </div>



  <?php include "../footer/section_footer.php" ?>
  <?php include "../footer/verified_footer.php" ?>

</body>


<!-- back to top -->
<a href="#" id="back-to-top" title="Back to top" class="social-icon social-icon-md"><i class="fas fa-angle-double-up removeMargin"></i></a>
<script type='text/javascript' src='../wp-content/themes/classiera/js/jquery.matchHeight6a4d.js?ver=6.1.1' id='jquery.matchHeight-js'></script>
<script type='text/javascript' src='../wp-content/themes/classiera/js/classiera6a4d.js?ver=6.1.1' id='classiera-js'></script>
<script type='text/javascript' src='../wp-content/themes/classiera/js/jquery-ui.min6a4d.js?ver=6.1.1' id='jquery-ui-js'></script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
  function show_table() {

    console.log("success");

  }
</script>



<?php include "./admin_script.php" ?>
<!-- for jquery table plugin  -->
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>


</html>