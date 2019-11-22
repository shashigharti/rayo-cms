@extends(Site::templateResolver('core::website.layouts.default'))
@inject('banner_helper','Robust\Banners\Helpers\BannerHelper')
@section('header')
    @include(Site::templateResolver('core::website.listings.partials..header'))
@endsection
@section('body_section')
    <section class="main-content map-section">
        <div class="row">
            <div class="map" id="left-container">
                <div id="map1"></div>
            </div>
            <div class="map-search__section" id="right-container">
                <div class="SearchSidePaneHeader">
                    <h1>Alaska Real State</h1>
                    <div class="SearchNavBar">
                        <div class="tab-heading">
                            <a href="#">Listings</a>
                        </div>
                        <div class="tab-heading selected">
                            <a href="#">Market Insights</a>
                        </div>
                    </div>
                </div>
                <div class="SearchSideContainer" id="marketInsights">
                    <div class="tab-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="CompeteScore region-content-section border-bottom">
                                    <h2 class="title primary-heading">Market Trends in <!-- -->San Diego</h2>
                                    <h3 class="secondary-heading">Calculated over the last <!-- -->3<!-- --> months</h3>
                                    <div class="scoreTM">
                                        <div class="score very">84</div>
                                        <div class="description">
                                            <div class="shortDescription">Very Competitive</div>
                                            <div class="trademarkWrapper" role="button"><span class="trademarkText">Redfin Compete Score</span>™</div>
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="static-bar">
                                        <span class="scale left">0</span>
                                        <div class="background-bar">
                                            <div class="foreground-bar very" style="width:84%"></div>
                                        </div>
                                        <span class="scale right">100</span>
                                    </div>
                                    <div class="scoreDetails">
                                        <ul class="details">
                                            <li class="details-row">
                                                <span>Homes typically receive 3 offers.</span>
                                            </li>
                                            <li class="details-row">
                                                <span>Homes  sell for about  1% below list price and  go pending in around 19 days.</span>
                                            </li>
                                        </ul>
                                        <ul class="details">
                                            <li class="details-row">
                                                <span>Hot Homes can  sell for about  1% above list price and  go pending in around 8 days.</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="RealEstateTrends region-content-section border-bottom">
                                    <h2 class="title primary-heading text-left">Home Prices in <!-- -->San Diego</h2>
                                    <h3 class="secondary-heading">Average over the last month</h3>
                                    <div class="DetailsComponent horizontal primary">
                                        <div class="detail">
                                            <div>
                                                <div class="value">
                                                    <span>$616K</span>
                                                </div>
                                                <div class="label">Sale Price</div>
                                            </div>
                                            <div class="sub-label">
                                                <span>+12.6%<br> since last year</span>
                                            </div>
                                        </div>
                                        <div class="detail saleSqft">
                                            <div>
                                                <div class="value">
                                                    <span>$441</span>
                                                </div>
                                                <div class="label">Sale $/Sq. Ft.</div>
                                            </div>
                                            <div class="sub-label">
                                                <span>+10.0%<br> since last year</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="DetailsComponent horizontal">
                                        <div class="detail">
                                            <div class="label">Under List Price</div>
                                            <div class="value">1.2%</div>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="detail">
                                            <div class="label">Days on Market</div>
                                            <div class="value"><span>19</span></div>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="detail">
                                            <div class="label">Down Payment</div>
                                            <div class="value"><span>28.2%</span></div>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="detail">
                                            <div class="label">Total Homes Sold</div><div class="value"><span>1060</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="StrategySessionCTA region-content-section border-bottom">
                                    <h2 class="title primary-heading">Make a Winning Offer in San Diego with a Redfin Agent</h2>
                                    <div class="cta-container">
                                        <a href="#" class="agents-image-container">
                                            <img class="agents-image" src="https://ssl.cdn-redfin.com/v234.2.2/images/agents/two_agents.jpg" alt="Two Redfin Agents">
                                        </a>
                                        <div class="cta-description">
                                            <p>Spend an hour learning about how to win your perfect home.</p>
                                        </div>
                                        <a href="#" class="button Button button tertiary cta-button" tabindex="0">
                                            <span>Meet with a Redfin Agent</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="school-section region-content-section" id="region-trends-section">
                                    <h2 class="primary-heading">Schools In San Diego</h2>
                                    <div class="schools-table">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="pill" href="#school1">Elementary</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#school2">Middle</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#school2">High</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="school1" class="tab-pane active"><br>
                                                <table>
                                                    <thead>
                                                    <tr>
                                                        <th class="name-col"> School Name </th>
                                                        <th class="gs-rating-col"> GreatSchools Rating </th>
                                                        <th class="rating-col"> Parent Rating </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="school-name font-size-base">Holmes Elementary School</div>
                                                            <div class="sub-info font-color-gray-light font-size-small">Public<!-- --> • <!-- -->K-6</div>
                                                        </td>
                                                        <td class="gs-rating-col"><div class="rating">10</div></td>
                                                        <td class="rating-col"><div class="star-rating inline-block"><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="school-name font-size-base">Holmes Elementary School</div>
                                                            <div class="sub-info font-color-gray-light font-size-small">Public<!-- --> • <!-- -->K-6</div>
                                                        </td>
                                                        <td class="gs-rating-col"><div class="rating">10</div></td>
                                                        <td class="rating-col"><div class="star-rating inline-block"><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="school-name font-size-base">Holmes Elementary School</div>
                                                            <div class="sub-info font-color-gray-light font-size-small">Public<!-- --> • <!-- -->K-6</div>
                                                        </td>
                                                        <td class="gs-rating-col"><div class="rating">10</div></td>
                                                        <td class="rating-col"><div class="star-rating inline-block"><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="school-name font-size-base">Holmes Elementary School</div>
                                                            <div class="sub-info font-color-gray-light font-size-small">Public<!-- --> • <!-- -->K-6</div>
                                                        </td>
                                                        <td class="gs-rating-col"><div class="rating">10</div></td>
                                                        <td class="rating-col"><div class="star-rating inline-block"><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="school-name font-size-base">Holmes Elementary School</div>
                                                            <div class="sub-info font-color-gray-light font-size-small">Public<!-- --> • <!-- -->K-6</div>
                                                        </td>
                                                        <td class="gs-rating-col"><div class="rating">10</div></td>
                                                        <td class="rating-col"><div class="star-rating inline-block"><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg></div></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="school2" class="tab-pane fade"><br>
                                                <table>
                                                    <thead>
                                                    <tr>
                                                        <th class="name-col"> School Name </th>
                                                        <th class="gs-rating-col"> GreatSchools Rating </th>
                                                        <th class="rating-col"> Parent Rating </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="school-name font-size-base">Holmes Elementary School</div>
                                                            <div class="sub-info font-color-gray-light font-size-small">Public<!-- --> • <!-- -->K-6</div>
                                                        </td>
                                                        <td class="gs-rating-col"><div class="rating">10</div></td>
                                                        <td class="rating-col"><div class="star-rating inline-block"><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="school-name font-size-base">Holmes Elementary School</div>
                                                            <div class="sub-info font-color-gray-light font-size-small">Public<!-- --> • <!-- -->K-6</div>
                                                        </td>
                                                        <td class="gs-rating-col"><div class="rating">10</div></td>
                                                        <td class="rating-col"><div class="star-rating inline-block"><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="school-name font-size-base">Holmes Elementary School</div>
                                                            <div class="sub-info font-color-gray-light font-size-small">Public<!-- --> • <!-- -->K-6</div>
                                                        </td>
                                                        <td class="gs-rating-col"><div class="rating">10</div></td>
                                                        <td class="rating-col"><div class="star-rating inline-block"><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="school-name font-size-base">Holmes Elementary School</div>
                                                            <div class="sub-info font-color-gray-light font-size-small">Public<!-- --> • <!-- -->K-6</div>
                                                        </td>
                                                        <td class="gs-rating-col"><div class="rating">10</div></td>
                                                        <td class="rating-col"><div class="star-rating inline-block"><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="school-name font-size-base">Holmes Elementary School</div>
                                                            <div class="sub-info font-color-gray-light font-size-small">Public<!-- --> • <!-- -->K-6</div>
                                                        </td>
                                                        <td class="gs-rating-col"><div class="rating">10</div></td>
                                                        <td class="rating-col"><div class="star-rating inline-block"><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg></div></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="school3" class="tab-pane fade"><br>
                                                <table>
                                                    <thead>
                                                    <tr>
                                                        <th class="name-col"> School Name </th>
                                                        <th class="gs-rating-col"> GreatSchools Rating </th>
                                                        <th class="rating-col"> Parent Rating </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="school-name font-size-base">Holmes Elementary School</div>
                                                            <div class="sub-info font-color-gray-light font-size-small">Public<!-- --> • <!-- -->K-6</div>
                                                        </td>
                                                        <td class="gs-rating-col"><div class="rating">10</div></td>
                                                        <td class="rating-col"><div class="star-rating inline-block"><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="school-name font-size-base">Holmes Elementary School</div>
                                                            <div class="sub-info font-color-gray-light font-size-small">Public<!-- --> • <!-- -->K-6</div>
                                                        </td>
                                                        <td class="gs-rating-col"><div class="rating">10</div></td>
                                                        <td class="rating-col"><div class="star-rating inline-block"><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="school-name font-size-base">Holmes Elementary School</div>
                                                            <div class="sub-info font-color-gray-light font-size-small">Public<!-- --> • <!-- -->K-6</div>
                                                        </td>
                                                        <td class="gs-rating-col"><div class="rating">10</div></td>
                                                        <td class="rating-col"><div class="star-rating inline-block"><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="school-name font-size-base">Holmes Elementary School</div>
                                                            <div class="sub-info font-color-gray-light font-size-small">Public<!-- --> • <!-- -->K-6</div>
                                                        </td>
                                                        <td class="gs-rating-col"><div class="rating">10</div></td>
                                                        <td class="rating-col"><div class="star-rating inline-block"><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="school-name font-size-base">Holmes Elementary School</div>
                                                            <div class="sub-info font-color-gray-light font-size-small">Public<!-- --> • <!-- -->K-6</div>
                                                        </td>
                                                        <td class="gs-rating-col"><div class="rating">10</div></td>
                                                        <td class="rating-col"><div class="star-rating inline-block"><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg><svg class="SvgIcon rfSvg rating"><svg viewBox="0 0 24 24"><path d="M8.005 8.198L.215 9.331a.25.25 0 0 0-.139.425l5.637 5.496-1.33 7.759a.25.25 0 0 0 .362.263l6.968-3.663 6.968 3.663a.25.25 0 0 0 .363-.263l-1.33-7.76 5.636-5.495a.25.25 0 0 0-.138-.425l-7.79-1.133-3.485-7.059a.25.25 0 0 0-.448 0L8.005 8.2" fill-rule="evenodd"></path></svg></svg></div></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="more-schools">Only showing 5 of 324 elementary schools.</div>
                                        <div class="subtext"><span>School data provided by <a href="#">GreatSchools</a>.<span> School service boundaries are intended to be used as reference only. To verify enrollment eligibility for a property, contact the school directly.</span></span></div>
                                    </div>
                                </div>
                                <div class="OfferInsightsSection region-content-section">
                                    <h2 id="offer-insights-heading" class="title primary-heading">Offer Insights in <!-- -->San Diego<!-- --> </h2>
                                    <ul>
                                        <li id="offer-insight-111614" class="OfferInsightsCard">
                                            <div class="offer-value">
                                                <span>~<!-- -->$1M</span> Offer
                                            </div>
                                            <div class="sale-date">
                                                <span>5 Weeks<!-- --> Ago</span>
                                            </div>
                                            <div class="home-stats">
                                                <span>6</span> <span>Beds<!-- -->, </span><span>3</span> <span>Baths<!-- -->, </span><span>~<!-- -->3,500</span> <span>Sq. Ft. </span>House
                                            </div>
                                            <div class="offer-result-line">
                                                <span class="offer-result won">Winning Offer</span>
                                            </div>
                                            <div class="DetailsComponent horizontal">
                                                <div class="detail">
                                                    <div class="label">Under List Price</div>
                                                    <div class="value">12%</div>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="detail">
                                                    <div class="label">Days on Market</div>
                                                    <div class="value"><span>5</span></div>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="detail">
                                                    <div class="label">Competing Offers</div>
                                                    <div class="value"><span>—</span></div>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="detail">
                                                    <div class="label">Down Payment</div>
                                                    <div class="value"><span>—</span></div>
                                                </div>
                                            </div>
                                            <div class="offer-insight">
                                                <p class="ExpandableText truncated">This home was listed with no pictures or additonal marketing materials, my buyers loved the neighborhood so we imedietly went over to see the home. Upon touring my...
                                                    <button class="button-text more-link">More</button>
                                                    <span class="expansion"> family decided it was the home for them. There was other people interested in the property. They had the option of a cash offer or getting a small loan with a large down payment. In the end, they decided not to take any chances and offered a full price cash offer with a quick close. We recieved a accepted offer! Our offer won the property before all the pictures and marketing material went out to the general public:)</span></p>
                                            </div>
                                            <div class="agent-info">
                                                <a class="agent-photo float-left" href="#">
                                                    <div class="photo-container">
                                                        <img class="transition-opaque-fast photo sprite-agent-outline" src="https://ssl.cdn-redfin.com/system_files/images/10009/150x150/gen120x120/1_58.jpg" style="opacity: 1;">
                                                    </div>
                                                </a>
                                                <div class="agent-details">
                                                    <a class="agent-detail-name" href="/real-estate-agents/ixie-weber">Ixie Weber</a>
                                                    <div class="agent-detail-title">San Diego <!-- -->Redfin Agent</div>
                                                </div>
                                            </div>
                                        </li>
                                        <li id="offer-insight-111614" class="OfferInsightsCard">
                                            <div class="offer-value">
                                                <span>~<!-- -->$1M</span> Offer
                                            </div>
                                            <div class="sale-date">
                                                <span>5 Weeks<!-- --> Ago</span>
                                            </div>
                                            <div class="home-stats">
                                                <span>6</span> <span>Beds<!-- -->, </span><span>3</span> <span>Baths<!-- -->, </span><span>~<!-- -->3,500</span> <span>Sq. Ft. </span>House
                                            </div>
                                            <div class="offer-result-line">
                                                <span class="offer-result won">Winning Offer</span>
                                            </div>
                                            <div class="DetailsComponent horizontal">
                                                <div class="detail">
                                                    <div class="label">Under List Price</div>
                                                    <div class="value">12%</div>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="detail">
                                                    <div class="label">Days on Market</div>
                                                    <div class="value"><span>5</span></div>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="detail">
                                                    <div class="label">Competing Offers</div>
                                                    <div class="value"><span>—</span></div>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="detail">
                                                    <div class="label">Down Payment</div>
                                                    <div class="value"><span>—</span></div>
                                                </div>
                                            </div>
                                            <div class="offer-insight">
                                                <p class="ExpandableText truncated">This home was listed with no pictures or additonal marketing materials, my buyers loved the neighborhood so we imedietly went over to see the home. Upon touring my...
                                                    <button class="button-text more-link">More</button>
                                                    <span class="expansion"> family decided it was the home for them. There was other people interested in the property. They had the option of a cash offer or getting a small loan with a large down payment. In the end, they decided not to take any chances and offered a full price cash offer with a quick close. We recieved a accepted offer! Our offer won the property before all the pictures and marketing material went out to the general public:)</span></p>
                                            </div>
                                            <div class="agent-info">
                                                <a class="agent-photo float-left" href="#">
                                                    <div class="photo-container">
                                                        <img class="transition-opaque-fast photo sprite-agent-outline" src="https://ssl.cdn-redfin.com/system_files/images/10009/150x150/gen120x120/1_58.jpg" style="opacity: 1;">
                                                    </div>
                                                </a>
                                                <div class="agent-details">
                                                    <a class="agent-detail-name" href="/real-estate-agents/ixie-weber">Ixie Weber</a>
                                                    <div class="agent-detail-title">San Diego <!-- -->Redfin Agent</div>
                                                </div>
                                            </div>
                                        </li>
                                        <li id="offer-insight-111614" class="OfferInsightsCard">
                                            <div class="offer-value">
                                                <span>~<!-- -->$1M</span> Offer
                                            </div>
                                            <div class="sale-date">
                                                <span>5 Weeks<!-- --> Ago</span>
                                            </div>
                                            <div class="home-stats">
                                                <span>6</span> <span>Beds<!-- -->, </span><span>3</span> <span>Baths<!-- -->, </span><span>~<!-- -->3,500</span> <span>Sq. Ft. </span>House
                                            </div>
                                            <div class="offer-result-line">
                                                <span class="offer-result won">Winning Offer</span>
                                            </div>
                                            <div class="DetailsComponent horizontal">
                                                <div class="detail">
                                                    <div class="label">Under List Price</div>
                                                    <div class="value">12%</div>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="detail">
                                                    <div class="label">Days on Market</div>
                                                    <div class="value"><span>5</span></div>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="detail">
                                                    <div class="label">Competing Offers</div>
                                                    <div class="value"><span>—</span></div>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="detail">
                                                    <div class="label">Down Payment</div>
                                                    <div class="value"><span>—</span></div>
                                                </div>
                                            </div>
                                            <div class="offer-insight">
                                                <p class="ExpandableText truncated">This home was listed with no pictures or additonal marketing materials, my buyers loved the neighborhood so we imedietly went over to see the home. Upon touring my...
                                                    <button class="button-text more-link">More</button>
                                                    <span class="expansion"> family decided it was the home for them. There was other people interested in the property. They had the option of a cash offer or getting a small loan with a large down payment. In the end, they decided not to take any chances and offered a full price cash offer with a quick close. We recieved a accepted offer! Our offer won the property before all the pictures and marketing material went out to the general public:)</span></p>
                                            </div>
                                            <div class="agent-info">
                                                <a class="agent-photo float-left" href="#">
                                                    <div class="photo-container">
                                                        <img class="transition-opaque-fast photo sprite-agent-outline" src="https://ssl.cdn-redfin.com/system_files/images/10009/150x150/gen120x120/1_58.jpg" style="opacity: 1;">
                                                    </div>
                                                </a>
                                                <div class="agent-details">
                                                    <a class="agent-detail-name" href="/real-estate-agents/ixie-weber">Ixie Weber</a>
                                                    <div class="agent-detail-title">San Diego <!-- -->Redfin Agent</div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="transportation-score-section region-content-section">
                                    <h2 class="title primary-heading">Transportation in San Diego</h2>
                                    <div class="walk-score">
                                        <div class="scrollable">
                                            <div class="viz-container">
                                                <div class="score inline-block not-last">
                                                    <svg class="SvgIcon rfSvg walkscore" style="fill:black;height:27px;width:27px">
                                                        <svg viewBox="0 0 24 24"><path d="M18.024 20.72l-5.402-7.716c.051-.327.31-1.59.532-2.655.107.188.213.36.271.414.178.167 2.676 1.89 2.885 1.959.36.121.805.029 1.064-.215.234-.222.323-.458.305-.815-.028-.533-.114-.592-1.545-1.577l-1.126-.775c-.149-.271-.92-1.781-1.433-2.789-.32-.634-1.069-1.027-2.044-1.051-.628 0-1.038.356-1.046.364 0 0-2.949 2.367-3.322 2.676-.376.312-.44.591-.449.707l-.76 3.308a1.03 1.03 0 0 0 .73 1.229c.568.159 1.158-.2 1.287-.763l.658-2.873.522-.407a269.3 269.3 0 0 1-.35 1.607 2.31 2.31 0 0 0-.056.56l-1.058 4.801-2.465 4.004a1.477 1.477 0 0 0-.177 1.142c.098.391.344.719.692.923.685.399 1.615.161 2.024-.512.65-1.071 2.181-3.597 2.373-3.93.28-.48.37-.928.371-.942l.391-1.833 4.752 6.823a1.45 1.45 0 0 0 2.376-1.664zM14.75 3a2 2 0 1 1-3.999.001 2 2 0 0 1 4-.001z" fill-rule="evenodd"></path></svg>
                                                    </svg>
                                                    <div class="percentage">
                                                        <span class="value fair">51</span>
                                                        <span class="total"> / 100</span>
                                                    </div>
                                                    <div class="description">Somewhat Walkable</div>
                                                    <div class="label">
                                                        <a class="walkscore-link" href="#">Walk Score</a>
                                                        <span class="registrationMark">®</span>
                                                    </div>
                                                </div>
                                                <div class="score inline-block not-last">
                                                    <svg class="SvgIcon rfSvg transitscore" style="fill:black;height:27px;width:27px">
                                                        <svg viewBox="0 0 24 24"><path d="M18 1h-3V0H9v1H6a3 3 0 0 0-3 3v14a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4a3 3 0 0 0-3-3zM5 12h14v5H5v-5zm14-2H5V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v6zm-.875 14H20.5a.25.25 0 0 0 .2-.4l-2.625-3.5a.25.25 0 0 0-.2-.1H15.5a.25.25 0 0 0-.2.4l2.625 3.5a.25.25 0 0 0 .2.1zm-12.25 0H3.5a.25.25 0 0 1-.2-.4l2.625-3.5a.25.25 0 0 1 .2-.1H8.5a.25.25 0 0 1 .2.4l-2.625 3.5a.25.25 0 0 1-.2.1zM18 14.5a1.5 1.5 0 1 1-3.001-.001A1.5 1.5 0 0 1 18 14.5zm-9 0a1.5 1.5 0 1 1-3.001-.001A1.5 1.5 0 0 1 9 14.5z" fill-rule="evenodd"></path></svg>
                                                    </svg>
                                                    <div class="percentage">
                                                        <span class="value poor">37</span>
                                                        <span class="total"> / 100</span>
                                                    </div>
                                                    <div class="description">Some Transit</div>
                                                    <div class="label">
                                                        <a class="walkscore-link" href="#">Transit Score</a><span class="registrationMark">®</span>
                                                    </div>
                                                </div>
                                                <div class="score inline-block">
                                                    <svg class="SvgIcon rfSvg bikescore" style="fill:black;height:27px;width:27px">
                                                        <svg viewBox="0 0 24 24"><path d="M22.122 11.284c-1.817-1.505-3.316-1.451-4.647-1.022L15.17 6h3.58a.25.25 0 0 0 .25-.25v-1.5a.25.25 0 0 0-.25-.25h-6.835a.25.25 0 0 0-.221.367L13.615 8H8l-.641-1.016L8 7V5.25A.25.25 0 0 0 7.75 5h-4.5a.25.25 0 0 0-.25.25v1.5c0 .138.112.25.25.25h1.828L6.39 9.056l-.566 1.027A4.981 4.981 0 0 0 5 10a5 5 0 0 0-5 5c0 2.703 2.297 5 5 5a5 5 0 0 0 5-5c0-.677-.138-1.321-.382-1.91l5.261-3.045.744 1.289a4.97 4.97 0 0 0-1.512 4.727c.399 1.919 1.962 3.468 3.887 3.842A5.006 5.006 0 0 0 24 15.046c.013-1.474-.742-2.822-1.878-3.762zm-14.929 5.91C4.73 19.087 2 17.356 2 15a2.993 2.993 0 0 1 2.754-2.975l-1.2 2.179a.244.244 0 0 0 .007.254c.189.288.667 1.002.899 1.348a.25.25 0 0 0 .332.077l3.069-1.776c.288.92.147 2.027-.668 3.087zm1.321-5.747a5.025 5.025 0 0 0-.855-.667l.392-.751h2.978l-2.515 1.418zm9.985 6.512a3.021 3.021 0 0 1-2.414-2.249 2.953 2.953 0 0 1 .581-2.571l1.343 2.327a.25.25 0 0 0 .342.092l1.305-.754a.249.249 0 0 0 .094-.335l-1.305-2.413c.858-.161 1.813-.057 2.99 1.439.318.405.548.898.564 1.413a3.005 3.005 0 0 1-3.5 3.051z" fill-rule="evenodd"></path></svg>
                                                    </svg>
                                                    <div class="percentage">
                                                        <span class="value poor">39</span>
                                                        <span class="total"> / 100</span>
                                                    </div>
                                                    <div class="description">Somewhat Bikeable</div>
                                                    <div class="label">
                                                        <a class="walkscore-link" href="#">Bike Score</a>
                                                        <span class="registrationMark">®</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc blurb">
                                            <span>This area is </span>
                                            <span class="font-weight-bold">somewhat walkable</span>
                                            <span> — some errands can be accomplished on foot. </span>
                                            <span></span><span class="font-weight-bold">Transit is available</span><span>, with a few nearby public transportation options. </span><span>There is </span><span class="font-weight-bold">a minimal amount of infrastructure for biking</span><span>. </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="neighborhood-photos-section region-content-section" id="neighborhood-photos-section">
                                    <h2 class="title primary-heading">Photos of San Diego</h2>
                                    <div class="neighborhood-photos-container count-6">
                                        <div class="place">
                                            <div class="photo-container">
                                                <img class="transition-opaque-fast" src="images/banners/block.jpg" style="opacity: 1;">
                                            </div>
                                            <p class="place-name">Garden</p>
                                        </div>
                                        <div class="place">
                                            <div class="photo-container">
                                                <img class="transition-opaque-fast" src="images/banners/block2.jpg" style="opacity: 1;">
                                            </div>
                                            <p class="place-name">Dwight St. &amp; Lantana Dr.</p>
                                        </div>
                                        <div class="place">
                                            <div class="photo-container">
                                                <img class="transition-opaque-fast" src="images/banners/block3.jpg" style="opacity: 1;">
                                            </div>
                                            <p class="place-name">Carlton St &amp; Fennel on St.</p>
                                        </div>
                                        <div class="place">
                                            <div class="photo-container">
                                                <img class="transition-opaque-fast"  src="images/banners/block.jpg" style="opacity: 1;">
                                            </div>
                                            <p class="place-name">Mountain View Community Center</p>
                                        </div>
                                        <div class="place">
                                            <div class="photo-container">
                                                <img class="transition-opaque-fast"  src="images/banners/block2.jpg" style="opacity: 1;">
                                            </div>
                                            <p class="place-name">La Jolla Cove</p>
                                        </div>
                                        <div class="place">
                                            <div class="photo-container">
                                                <img class="transition-opaque-fast"  src="images/banners/block3.jpg" style="opacity: 1;">
                                            </div>
                                            <p class="place-name">Lahaina Beach House</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="MoreResources region-content-section" id="more-resources-section">
                                    <h2 class="primary-heading">More Real Estate Resources for San Diego</h2>
                                    <div class="columns">
                                        <div class="resources-section">
                                            <h3 role="heading">Nearby Cities</h3>
                                            <ul>
                                                <li><a class="link-text" href="#">Santee Homes For Sale</a></li>
                                                <li><a class="link-text" href="#">Coronado Homes For Sale</a></li>
                                                <li><a class="link-text" href="#">La Mesa Homes For Sale</a></li>
                                                <li><a class="link-text" href="#">Descanso Homes For Sale</a></li>
                                                <li><a class="link-text" href="#">El Cajon Homes For Sale</a></li>
                                                <li><a class="link-text" href="#">Lemon Grove Homes For Sale</a></li>
                                                <li><a class="link-text hidden" href="#">National City Homes For Sale</a></li>
                                                <li><a class="link-text hidden" href="#">Rancho San Diego Homes For Sale</a></li>
                                                <li><a class="link-text hidden" href="#">Bonita Homes For Sale</a></li>
                                                <li><a class="link-text hidden" href="#">Imperial Beach Homes For Sale</a></li>
                                                <li><a class="link-text hidden" href="#">Casa de Oro-Mount Helix Homes For Sale</a></li>
                                                <li><a class="link-text hidden" href="#">Jamul Homes For Sale</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map1'), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 8
            });

            var drawingManager = new google.maps.drawing.DrawingManager({
                drawingMode: google.maps.drawing.OverlayType.MARKER,
                drawingControl: true,
                drawingControlOptions: {
                    position: google.maps.ControlPosition.TOP_CENTER,
                    drawingModes: ['circle']
                },
                markerOptions: {icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'},
                circleOptions: {
                    fillColor: '#599de6',
                    fillOpacity: 0.6,
                    strokeWeight:0,
                    clickable: false,
                    editable: true,
                    zIndex: 1
                }
            });
            drawingManager.setMap(map);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVMGPU0xbiE-XtO-U61AltLGW05KKF0cY&libraries=drawing&callback=initMap"
            async defer></script>
@endsection
@section('footer')
@endsection

