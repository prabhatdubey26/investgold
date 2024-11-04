{{-- 
@extends('include/header_main')
@section('title', 'Contact')
@section('content') --}}

<!-- TradingView Widget BEGIN -->
<div height="600px">
  <a href="/">Back to home</a>
  <div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on TradingView</span></a></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
    {
    "symbols": [
      [
        "FX_IDC:USDMUR|1D|MUR"
      ],
      [
        "TVC:GOLD|1D|MUR"
      ],
      [
        "TVC:SILVER|1D|MUR"
      ]
    ],
    "chartOnly": false,
    "width": "100%",
    "height": "100%",
    "locale": "en",
    "colorTheme": "light",
    "autosize": true,
    "showVolume": false,
    "showMA": false,
    "hideDateRanges": false,
    "hideMarketStatus": false,
    "hideSymbolLogo": false,
    "scalePosition": "right",
    "scaleMode": "Normal",
    "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
    "fontSize": "10",
    "noTimeScale": false,
    "valuesTracking": "1",
    "changeMode": "price-and-percent",
    "chartType": "area",
    "maLineColor": "#2962FF",
    "maLineWidth": 1,
    "maLength": 9,
    "headerFontSize": "medium",
    "backgroundColor": "rgba(255, 255, 255, 1)",
    "lineWidth": 2,
    "lineType": 0,
    "dateRanges": [
      "1d|1",
      "1m|30",
      "3m|60",
      "12m|1D",
      "60m|1W",
      "all|1M"
    ]
  }
    </script>
  </div>
</div>

<!-- TradingView Widget END -->

{{-- @endsection --}}