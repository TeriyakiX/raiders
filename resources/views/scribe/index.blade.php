<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Raiders</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-4.38.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-4.38.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-documentation">
                                <a href="#endpoints-GETapi-documentation">Display Swagger API page.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-oauth2-callback">
                                <a href="#endpoints-GETapi-oauth2-callback">Display Oauth2 callback pages.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-general-settings">
                                <a href="#endpoints-GETapi-dao-admin-game-general-settings">GET api/dao/admin/game/general/settings</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-dao-admin-game-general-settings">
                                <a href="#endpoints-PUTapi-dao-admin-game-general-settings">PUT api/dao/admin/game/general/settings</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-general-leagues">
                                <a href="#endpoints-GETapi-dao-admin-game-general-leagues">GET api/dao/admin/game/general/leagues</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-dao-admin-game-general-leagues">
                                <a href="#endpoints-PUTapi-dao-admin-game-general-leagues">PUT api/dao/admin/game/general/leagues</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-general-math">
                                <a href="#endpoints-GETapi-dao-admin-game-general-math">GET api/dao/admin/game/general/math</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-dao-admin-game-general-math">
                                <a href="#endpoints-PUTapi-dao-admin-game-general-math">PUT api/dao/admin/game/general/math</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-locations">
                                <a href="#endpoints-GETapi-dao-admin-game-locations">GET api/dao/admin/game/locations</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-locations--id-">
                                <a href="#endpoints-GETapi-dao-admin-game-locations--id-">GET api/dao/admin/game/locations/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-dao-admin-game-locations">
                                <a href="#endpoints-POSTapi-dao-admin-game-locations">POST api/dao/admin/game/locations</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-dao-admin-game-locations--id-">
                                <a href="#endpoints-DELETEapi-dao-admin-game-locations--id-">DELETE api/dao/admin/game/locations/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-dao-admin-game-locations--id-">
                                <a href="#endpoints-PUTapi-dao-admin-game-locations--id-">PUT api/dao/admin/game/locations/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-factions">
                                <a href="#endpoints-GETapi-dao-admin-game-factions">GET api/dao/admin/game/factions</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-factions--id-">
                                <a href="#endpoints-GETapi-dao-admin-game-factions--id-">GET api/dao/admin/game/factions/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-dao-admin-game-factions">
                                <a href="#endpoints-POSTapi-dao-admin-game-factions">POST api/dao/admin/game/factions</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-dao-admin-game-factions--id-">
                                <a href="#endpoints-PUTapi-dao-admin-game-factions--id-">PUT api/dao/admin/game/factions/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-dao-admin-game-factions--id-">
                                <a href="#endpoints-DELETEapi-dao-admin-game-factions--id-">DELETE api/dao/admin/game/factions/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-presets">
                                <a href="#endpoints-GETapi-dao-admin-game-presets">GET api/dao/admin/game/presets</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-presets--id-">
                                <a href="#endpoints-GETapi-dao-admin-game-presets--id-">GET api/dao/admin/game/presets/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-dao-admin-game-presets">
                                <a href="#endpoints-POSTapi-dao-admin-game-presets">POST api/dao/admin/game/presets</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-dao-admin-game-presets--id-">
                                <a href="#endpoints-PUTapi-dao-admin-game-presets--id-">PUT api/dao/admin/game/presets/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-dao-admin-game-presets--id-">
                                <a href="#endpoints-DELETEapi-dao-admin-game-presets--id-">DELETE api/dao/admin/game/presets/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-events">
                                <a href="#endpoints-GETapi-dao-admin-game-events">GET api/dao/admin/game/events</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-dao-admin-game-events">
                                <a href="#endpoints-POSTapi-dao-admin-game-events">POST api/dao/admin/game/events</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-events--id-">
                                <a href="#endpoints-GETapi-dao-admin-game-events--id-">GET api/dao/admin/game/events/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-dao-admin-game-events--id-">
                                <a href="#endpoints-PUTapi-dao-admin-game-events--id-">PUT api/dao/admin/game/events/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-dao-admin-game-events--event_id--go-to-event">
                                <a href="#endpoints-POSTapi-dao-admin-game-events--event_id--go-to-event">Запись пользователя на событие по его id.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-user-inventory">
                                <a href="#endpoints-GETapi-dao-admin-game-user-inventory">GET api/dao/admin/game/user/inventory</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-user-character--tokenId-">
                                <a href="#endpoints-GETapi-dao-admin-game-user-character--tokenId-">GET api/dao/admin/game/user/character/{tokenId}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-user-village--tokenId-">
                                <a href="#endpoints-GETapi-dao-admin-game-user-village--tokenId-">GET api/dao/admin/game/user/village/{tokenId}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-cards--id-">
                                <a href="#endpoints-GETapi-dao-admin-game-cards--id-">GET api/dao/admin/game/cards/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-dao-admin-game-squad-add--cardId-">
                                <a href="#endpoints-POSTapi-dao-admin-game-squad-add--cardId-">POST api/dao/admin/game/squad/add/{cardId}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-dao-admin-game-squad-remove--cardId-">
                                <a href="#endpoints-DELETEapi-dao-admin-game-squad-remove--cardId-">DELETE api/dao/admin/game/squad/remove/{cardId}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-events-users--event_id-">
                                <a href="#endpoints-GETapi-dao-admin-game-events-users--event_id-">GET api/dao/admin/game/events/users/{event_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-squad-search">
                                <a href="#endpoints-GETapi-dao-admin-game-squad-search">GET api/dao/admin/game/squad/search</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-battle-rules">
                                <a href="#endpoints-GETapi-dao-admin-game-battle-rules">GET api/dao/admin/game/battle-rules</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-battle-rules--id-">
                                <a href="#endpoints-GETapi-dao-admin-game-battle-rules--id-">GET api/dao/admin/game/battle-rules/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-dao-admin-game-battle-rules--id-">
                                <a href="#endpoints-PUTapi-dao-admin-game-battle-rules--id-">PUT api/dao/admin/game/battle-rules/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-parameters">
                                <a href="#endpoints-GETapi-dao-admin-game-parameters">GET api/dao/admin/game/parameters</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-leagues">
                                <a href="#endpoints-GETapi-dao-admin-game-leagues">GET api/dao/admin/game/leagues</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-dao-admin-game-leagues">
                                <a href="#endpoints-POSTapi-dao-admin-game-leagues">POST api/dao/admin/game/leagues</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-leagues--id-">
                                <a href="#endpoints-GETapi-dao-admin-game-leagues--id-">GET api/dao/admin/game/leagues/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-dao-admin-game-leagues--id-">
                                <a href="#endpoints-PUTapi-dao-admin-game-leagues--id-">PUT api/dao/admin/game/leagues/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-dao-admin-game-leagues--id-">
                                <a href="#endpoints-DELETEapi-dao-admin-game-leagues--id-">DELETE api/dao/admin/game/leagues/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-dao-admin-game-battles">
                                <a href="#endpoints-POSTapi-dao-admin-game-battles">POST api/dao/admin/game/battles</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-battles--battle_id-">
                                <a href="#endpoints-GETapi-dao-admin-game-battles--battle_id-">GET api/dao/admin/game/battles/{battle_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-dao-admin-game-battles-perform--battle_id-">
                                <a href="#endpoints-POSTapi-dao-admin-game-battles-perform--battle_id-">POST api/dao/admin/game/battles/perform/{battle_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dao-admin-game-battles--battle_id--logs">
                                <a href="#endpoints-GETapi-dao-admin-game-battles--battle_id--logs">GET api/dao/admin/game/battles/{battle_id}/logs</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-dao-admin-game-cards--card_id--freeze">
                                <a href="#endpoints-POSTapi-dao-admin-game-cards--card_id--freeze">POST api/dao/admin/game/cards/{card_id}/freeze</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-dao-admin-game-cards--card_id--unfreeze">
                                <a href="#endpoints-POSTapi-dao-admin-game-cards--card_id--unfreeze">POST api/dao/admin/game/cards/{card_id}/unfreeze</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PATCHapi-dao-admin-game-users--user_id--update_league_points">
                                <a href="#endpoints-PATCHapi-dao-admin-game-users--user_id--update_league_points">PATCH api/dao/admin/game/users/{user_id}/update_league_points</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-user">
                                <a href="#endpoints-GETapi-user">GET api/user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-auth-metamask">
                                <a href="#endpoints-POSTapi-auth-metamask">POST api/auth/metamask</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-user-inventory">
                                <a href="#endpoints-GETapi-user-inventory">GET api/user/inventory</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-OPTIONSapi--any-">
                                <a href="#endpoints-OPTIONSapi--any-">OPTIONS api/{any}</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: November 22, 2024</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>Документация для Raiders</p>
<aside>
    <strong>Base URL</strong>: <code>http://127.0.0.1:8000/api</code>
</aside>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-documentation">Display Swagger API page.</h2>

<p>
</p>



<span id="example-requests-GETapi-documentation">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/documentation" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/documentation"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-documentation">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
&lt;head&gt;
    &lt;meta charset=&quot;UTF-8&quot;&gt;
    &lt;title&gt;L5 Swagger UI&lt;/title&gt;
    &lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;http://127.0.0.1:8000/api/docs/asset/swagger-ui.css?v=0755b7093afdd36d03212b65315f0209&quot;&gt;
    &lt;link rel=&quot;icon&quot; type=&quot;image/png&quot; href=&quot;http://127.0.0.1:8000/api/docs/asset/favicon-32x32.png?v=40d4f2c38d1cd854ad463f16373cbcb6&quot; sizes=&quot;32x32&quot;/&gt;
    &lt;link rel=&quot;icon&quot; type=&quot;image/png&quot; href=&quot;http://127.0.0.1:8000/api/docs/asset/favicon-16x16.png?v=f0ae831196d55d8f4115b6c5e8ec5384&quot; sizes=&quot;16x16&quot;/&gt;
    &lt;style&gt;
    html
    {
        box-sizing: border-box;
        overflow: -moz-scrollbars-vertical;
        overflow-y: scroll;
    }
    *,
    *:before,
    *:after
    {
        box-sizing: inherit;
    }

    body {
      margin:0;
      background: #fafafa;
    }
    &lt;/style&gt;
    &lt;/head&gt;

&lt;body &gt;
&lt;div id=&quot;swagger-ui&quot;&gt;&lt;/div&gt;

&lt;script src=&quot;http://127.0.0.1:8000/api/docs/asset/swagger-ui-bundle.js?v=6c23777357d2beae9650f9aa035d93fb&quot;&gt;&lt;/script&gt;
&lt;script src=&quot;http://127.0.0.1:8000/api/docs/asset/swagger-ui-standalone-preset.js?v=6b2892eb9458da5c3224817b3984d14c&quot;&gt;&lt;/script&gt;
&lt;script&gt;
    window.onload = function() {
        // Build a system
        const ui = SwaggerUIBundle({
            dom_id: &#039;#swagger-ui&#039;,
            url: &quot;http://127.0.0.1:8000/api/docs/api-docs.json&quot;,
            operationsSorter: null,
            configUrl: null,
            validatorUrl: null,
            oauth2RedirectUrl: &quot;http://127.0.0.1:8000/api/api/oauth2-callback&quot;,

            requestInterceptor: function(request) {
                request.headers[&#039;X-CSRF-TOKEN&#039;] = &#039;&#039;;
                return request;
            },

            presets: [
                SwaggerUIBundle.presets.apis,
                SwaggerUIStandalonePreset
            ],

            plugins: [
                SwaggerUIBundle.plugins.DownloadUrl
            ],

            layout: &quot;StandaloneLayout&quot;,
            docExpansion : &quot;none&quot;,
            deepLinking: true,
            filter: true,
            persistAuthorization: &quot;false&quot;,

        })

        window.ui = ui

            }
&lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETapi-documentation" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-documentation"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-documentation"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-documentation" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-documentation">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-documentation" data-method="GET"
      data-path="api/documentation"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-documentation', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-documentation"
                    onclick="tryItOut('GETapi-documentation');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-documentation"
                    onclick="cancelTryOut('GETapi-documentation');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-documentation"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/documentation</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-documentation"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-documentation"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-oauth2-callback">Display Oauth2 callback pages.</h2>

<p>
</p>



<span id="example-requests-GETapi-oauth2-callback">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/oauth2-callback" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/oauth2-callback"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-oauth2-callback">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!doctype html&gt;
&lt;html lang=&quot;en-US&quot;&gt;
&lt;head&gt;
    &lt;title&gt;Swagger UI: OAuth2 Redirect&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;script&gt;
    &#039;use strict&#039;;
    function run () {
        var oauth2 = window.opener.swaggerUIRedirectOauth2;
        var sentState = oauth2.state;
        var redirectUrl = oauth2.redirectUrl;
        var isValid, qp, arr;

        if (/code|token|error/.test(window.location.hash)) {
            qp = window.location.hash.substring(1).replace(&#039;?&#039;, &#039;&amp;&#039;);
        } else {
            qp = location.search.substring(1);
        }

        arr = qp.split(&quot;&amp;&quot;);
        arr.forEach(function (v,i,_arr) { _arr[i] = &#039;&quot;&#039; + v.replace(&#039;=&#039;, &#039;&quot;:&quot;&#039;) + &#039;&quot;&#039;;});
        qp = qp ? JSON.parse(&#039;{&#039; + arr.join() + &#039;}&#039;,
                function (key, value) {
                    return key === &quot;&quot; ? value : decodeURIComponent(value);
                }
        ) : {};

        isValid = qp.state === sentState;

        if ((
          oauth2.auth.schema.get(&quot;flow&quot;) === &quot;accessCode&quot; ||
          oauth2.auth.schema.get(&quot;flow&quot;) === &quot;authorizationCode&quot; ||
          oauth2.auth.schema.get(&quot;flow&quot;) === &quot;authorization_code&quot;
        ) &amp;&amp; !oauth2.auth.code) {
            if (!isValid) {
                oauth2.errCb({
                    authId: oauth2.auth.name,
                    source: &quot;auth&quot;,
                    level: &quot;warning&quot;,
                    message: &quot;Authorization may be unsafe, passed state was changed in server. The passed state wasn&#039;t returned from auth server.&quot;
                });
            }

            if (qp.code) {
                delete oauth2.state;
                oauth2.auth.code = qp.code;
                oauth2.callback({auth: oauth2.auth, redirectUrl: redirectUrl});
            } else {
                let oauthErrorMsg;
                if (qp.error) {
                    oauthErrorMsg = &quot;[&quot;+qp.error+&quot;]: &quot; +
                        (qp.error_description ? qp.error_description+ &quot;. &quot; : &quot;no accessCode received from the server. &quot;) +
                        (qp.error_uri ? &quot;More info: &quot;+qp.error_uri : &quot;&quot;);
                }

                oauth2.errCb({
                    authId: oauth2.auth.name,
                    source: &quot;auth&quot;,
                    level: &quot;error&quot;,
                    message: oauthErrorMsg || &quot;[Authorization failed]: no accessCode received from the server.&quot;
                });
            }
        } else {
            oauth2.callback({auth: oauth2.auth, token: qp, isValid: isValid, redirectUrl: redirectUrl});
        }
        window.close();
    }

    if (document.readyState !== &#039;loading&#039;) {
        run();
    } else {
        document.addEventListener(&#039;DOMContentLoaded&#039;, function () {
            run();
        });
    }
&lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETapi-oauth2-callback" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-oauth2-callback"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-oauth2-callback"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-oauth2-callback" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-oauth2-callback">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-oauth2-callback" data-method="GET"
      data-path="api/oauth2-callback"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-oauth2-callback', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-oauth2-callback"
                    onclick="tryItOut('GETapi-oauth2-callback');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-oauth2-callback"
                    onclick="cancelTryOut('GETapi-oauth2-callback');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-oauth2-callback"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/oauth2-callback</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-oauth2-callback"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-oauth2-callback"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-general-settings">GET api/dao/admin/game/general/settings</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-general-settings">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/general/settings" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/general/settings"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-general-settings">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 33
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-general-settings" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-general-settings"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-general-settings"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-general-settings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-general-settings">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-general-settings" data-method="GET"
      data-path="api/dao/admin/game/general/settings"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-general-settings', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-general-settings"
                    onclick="tryItOut('GETapi-dao-admin-game-general-settings');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-general-settings"
                    onclick="cancelTryOut('GETapi-dao-admin-game-general-settings');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-general-settings"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/general/settings</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-general-settings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-general-settings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-PUTapi-dao-admin-game-general-settings">PUT api/dao/admin/game/general/settings</h2>

<p>
</p>



<span id="example-requests-PUTapi-dao-admin-game-general-settings">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/api/dao/admin/game/general/settings" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/general/settings"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-dao-admin-game-general-settings">
</span>
<span id="execution-results-PUTapi-dao-admin-game-general-settings" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-dao-admin-game-general-settings"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-dao-admin-game-general-settings"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-dao-admin-game-general-settings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-dao-admin-game-general-settings">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-dao-admin-game-general-settings" data-method="PUT"
      data-path="api/dao/admin/game/general/settings"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-dao-admin-game-general-settings', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-dao-admin-game-general-settings"
                    onclick="tryItOut('PUTapi-dao-admin-game-general-settings');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-dao-admin-game-general-settings"
                    onclick="cancelTryOut('PUTapi-dao-admin-game-general-settings');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-dao-admin-game-general-settings"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/dao/admin/game/general/settings</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-dao-admin-game-general-settings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-dao-admin-game-general-settings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-general-leagues">GET api/dao/admin/game/general/leagues</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-general-leagues">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/general/leagues" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/general/leagues"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-general-leagues">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 32
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-general-leagues" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-general-leagues"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-general-leagues"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-general-leagues" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-general-leagues">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-general-leagues" data-method="GET"
      data-path="api/dao/admin/game/general/leagues"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-general-leagues', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-general-leagues"
                    onclick="tryItOut('GETapi-dao-admin-game-general-leagues');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-general-leagues"
                    onclick="cancelTryOut('GETapi-dao-admin-game-general-leagues');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-general-leagues"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/general/leagues</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-general-leagues"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-general-leagues"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-PUTapi-dao-admin-game-general-leagues">PUT api/dao/admin/game/general/leagues</h2>

<p>
</p>



<span id="example-requests-PUTapi-dao-admin-game-general-leagues">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/api/dao/admin/game/general/leagues" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/general/leagues"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-dao-admin-game-general-leagues">
</span>
<span id="execution-results-PUTapi-dao-admin-game-general-leagues" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-dao-admin-game-general-leagues"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-dao-admin-game-general-leagues"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-dao-admin-game-general-leagues" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-dao-admin-game-general-leagues">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-dao-admin-game-general-leagues" data-method="PUT"
      data-path="api/dao/admin/game/general/leagues"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-dao-admin-game-general-leagues', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-dao-admin-game-general-leagues"
                    onclick="tryItOut('PUTapi-dao-admin-game-general-leagues');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-dao-admin-game-general-leagues"
                    onclick="cancelTryOut('PUTapi-dao-admin-game-general-leagues');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-dao-admin-game-general-leagues"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/dao/admin/game/general/leagues</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-dao-admin-game-general-leagues"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-dao-admin-game-general-leagues"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-general-math">GET api/dao/admin/game/general/math</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-general-math">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/general/math" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/general/math"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-general-math">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 31
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-general-math" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-general-math"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-general-math"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-general-math" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-general-math">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-general-math" data-method="GET"
      data-path="api/dao/admin/game/general/math"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-general-math', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-general-math"
                    onclick="tryItOut('GETapi-dao-admin-game-general-math');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-general-math"
                    onclick="cancelTryOut('GETapi-dao-admin-game-general-math');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-general-math"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/general/math</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-general-math"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-general-math"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-PUTapi-dao-admin-game-general-math">PUT api/dao/admin/game/general/math</h2>

<p>
</p>



<span id="example-requests-PUTapi-dao-admin-game-general-math">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/api/dao/admin/game/general/math" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/general/math"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-dao-admin-game-general-math">
</span>
<span id="execution-results-PUTapi-dao-admin-game-general-math" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-dao-admin-game-general-math"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-dao-admin-game-general-math"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-dao-admin-game-general-math" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-dao-admin-game-general-math">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-dao-admin-game-general-math" data-method="PUT"
      data-path="api/dao/admin/game/general/math"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-dao-admin-game-general-math', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-dao-admin-game-general-math"
                    onclick="tryItOut('PUTapi-dao-admin-game-general-math');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-dao-admin-game-general-math"
                    onclick="cancelTryOut('PUTapi-dao-admin-game-general-math');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-dao-admin-game-general-math"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/dao/admin/game/general/math</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-dao-admin-game-general-math"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-dao-admin-game-general-math"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-locations">GET api/dao/admin/game/locations</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-locations">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/locations" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/locations"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-locations">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 30
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;title&quot;: &quot;ad&quot;
    },
    {
        &quot;id&quot;: 2,
        &quot;title&quot;: &quot;Great Valley&quot;
    },
    {
        &quot;id&quot;: 3,
        &quot;title&quot;: &quot;Great Valley&quot;
    },
    {
        &quot;id&quot;: 4,
        &quot;title&quot;: &quot;Great Valley&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-locations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-locations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-locations"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-locations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-locations">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-locations" data-method="GET"
      data-path="api/dao/admin/game/locations"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-locations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-locations"
                    onclick="tryItOut('GETapi-dao-admin-game-locations');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-locations"
                    onclick="cancelTryOut('GETapi-dao-admin-game-locations');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-locations"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/locations</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-locations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-locations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-locations--id-">GET api/dao/admin/game/locations/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-locations--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/locations/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/locations/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-locations--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 29
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;title&quot;: &quot;ad&quot;,
    &quot;address&quot;: &quot;23&quot;,
    &quot;fractions&quot;: [
        &quot;Outcasts&quot;,
        &quot;Hyenas&quot;,
        &quot;Flawless&quot;,
        &quot;Primals&quot;,
        &quot;Valkyries&quot;,
        &quot;Gentlemen&quot;
    ],
    &quot;type&quot;: &quot;village&quot;,
    &quot;type_id&quot;: null,
    &quot;description&quot;: &quot;This is a new location created via Postman.&quot;,
    &quot;picture&quot;: &quot;https://example.com/image.jpg&quot;,
    &quot;minimap&quot;: &quot;https://example.com/minimap.png&quot;,
    &quot;created_at&quot;: &quot;2024-11-13T11:20:35.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2024-11-13T11:20:35.000000Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-locations--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-locations--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-locations--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-locations--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-locations--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-locations--id-" data-method="GET"
      data-path="api/dao/admin/game/locations/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-locations--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-locations--id-"
                    onclick="tryItOut('GETapi-dao-admin-game-locations--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-locations--id-"
                    onclick="cancelTryOut('GETapi-dao-admin-game-locations--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-locations--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/locations/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-locations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-locations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-dao-admin-game-locations--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the location. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-dao-admin-game-locations">POST api/dao/admin/game/locations</h2>

<p>
</p>



<span id="example-requests-POSTapi-dao-admin-game-locations">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/api/dao/admin/game/locations" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"huwbvig\",
    \"address\": \"et\",
    \"type_id\": \"voluptatem\",
    \"description\": \"Qui nostrum aut autem quae ducimus sed ipsum.\",
    \"picture\": \"numquam\",
    \"minimap\": \"rerum\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/locations"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "huwbvig",
    "address": "et",
    "type_id": "voluptatem",
    "description": "Qui nostrum aut autem quae ducimus sed ipsum.",
    "picture": "numquam",
    "minimap": "rerum"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-dao-admin-game-locations">
</span>
<span id="execution-results-POSTapi-dao-admin-game-locations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-dao-admin-game-locations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-dao-admin-game-locations"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-dao-admin-game-locations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-dao-admin-game-locations">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-dao-admin-game-locations" data-method="POST"
      data-path="api/dao/admin/game/locations"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-dao-admin-game-locations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-dao-admin-game-locations"
                    onclick="tryItOut('POSTapi-dao-admin-game-locations');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-dao-admin-game-locations"
                    onclick="cancelTryOut('POSTapi-dao-admin-game-locations');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-dao-admin-game-locations"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/dao/admin/game/locations</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-dao-admin-game-locations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-dao-admin-game-locations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTapi-dao-admin-game-locations"
               value="huwbvig"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>huwbvig</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="POSTapi-dao-admin-game-locations"
               value="et"
               data-component="body">
    <br>
<p>Example: <code>et</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fractions</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="fractions[0]"                data-endpoint="POSTapi-dao-admin-game-locations"
               data-component="body">
        <input type="text" style="display: none"
               name="fractions[1]"                data-endpoint="POSTapi-dao-admin-game-locations"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the factions table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type_id"                data-endpoint="POSTapi-dao-admin-game-locations"
               value="voluptatem"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the location_types table. Example: <code>voluptatem</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-dao-admin-game-locations"
               value="Qui nostrum aut autem quae ducimus sed ipsum."
               data-component="body">
    <br>
<p>Must not be greater than 1000 characters. Example: <code>Qui nostrum aut autem quae ducimus sed ipsum.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>picture</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="picture"                data-endpoint="POSTapi-dao-admin-game-locations"
               value="numquam"
               data-component="body">
    <br>
<p>Example: <code>numquam</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>minimap</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="minimap"                data-endpoint="POSTapi-dao-admin-game-locations"
               value="rerum"
               data-component="body">
    <br>
<p>Example: <code>rerum</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-dao-admin-game-locations--id-">DELETE api/dao/admin/game/locations/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-dao-admin-game-locations--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/api/dao/admin/game/locations/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/locations/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-dao-admin-game-locations--id-">
</span>
<span id="execution-results-DELETEapi-dao-admin-game-locations--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-dao-admin-game-locations--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-dao-admin-game-locations--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-dao-admin-game-locations--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-dao-admin-game-locations--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-dao-admin-game-locations--id-" data-method="DELETE"
      data-path="api/dao/admin/game/locations/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-dao-admin-game-locations--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-dao-admin-game-locations--id-"
                    onclick="tryItOut('DELETEapi-dao-admin-game-locations--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-dao-admin-game-locations--id-"
                    onclick="cancelTryOut('DELETEapi-dao-admin-game-locations--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-dao-admin-game-locations--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/dao/admin/game/locations/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-dao-admin-game-locations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-dao-admin-game-locations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-dao-admin-game-locations--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the location. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-dao-admin-game-locations--id-">PUT api/dao/admin/game/locations/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-dao-admin-game-locations--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/api/dao/admin/game/locations/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"obgdfgxdaodlel\",
    \"address\": \"officia\",
    \"type_id\": \"dolorem\",
    \"description\": \"Et ut libero laudantium voluptatem.\",
    \"picture\": \"est\",
    \"minimap\": \"quisquam\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/locations/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "obgdfgxdaodlel",
    "address": "officia",
    "type_id": "dolorem",
    "description": "Et ut libero laudantium voluptatem.",
    "picture": "est",
    "minimap": "quisquam"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-dao-admin-game-locations--id-">
</span>
<span id="execution-results-PUTapi-dao-admin-game-locations--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-dao-admin-game-locations--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-dao-admin-game-locations--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-dao-admin-game-locations--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-dao-admin-game-locations--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-dao-admin-game-locations--id-" data-method="PUT"
      data-path="api/dao/admin/game/locations/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-dao-admin-game-locations--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-dao-admin-game-locations--id-"
                    onclick="tryItOut('PUTapi-dao-admin-game-locations--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-dao-admin-game-locations--id-"
                    onclick="cancelTryOut('PUTapi-dao-admin-game-locations--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-dao-admin-game-locations--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/dao/admin/game/locations/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-dao-admin-game-locations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-dao-admin-game-locations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-dao-admin-game-locations--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the location. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="PUTapi-dao-admin-game-locations--id-"
               value="obgdfgxdaodlel"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>obgdfgxdaodlel</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="address"                data-endpoint="PUTapi-dao-admin-game-locations--id-"
               value="officia"
               data-component="body">
    <br>
<p>Example: <code>officia</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fractions</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="fractions[0]"                data-endpoint="PUTapi-dao-admin-game-locations--id-"
               data-component="body">
        <input type="text" style="display: none"
               name="fractions[1]"                data-endpoint="PUTapi-dao-admin-game-locations--id-"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the factions table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type_id"                data-endpoint="PUTapi-dao-admin-game-locations--id-"
               value="dolorem"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the location_types table. Example: <code>dolorem</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-dao-admin-game-locations--id-"
               value="Et ut libero laudantium voluptatem."
               data-component="body">
    <br>
<p>Must not be greater than 1000 characters. Example: <code>Et ut libero laudantium voluptatem.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>picture</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="picture"                data-endpoint="PUTapi-dao-admin-game-locations--id-"
               value="est"
               data-component="body">
    <br>
<p>Example: <code>est</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>minimap</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="minimap"                data-endpoint="PUTapi-dao-admin-game-locations--id-"
               value="quisquam"
               data-component="body">
    <br>
<p>Example: <code>quisquam</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-factions">GET api/dao/admin/game/factions</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-factions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/factions" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/factions"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-factions">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 28
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Primals&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Gentlemen&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Immaculates&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Hyenas&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Valkyries&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Outcasts&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-factions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-factions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-factions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-factions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-factions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-factions" data-method="GET"
      data-path="api/dao/admin/game/factions"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-factions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-factions"
                    onclick="tryItOut('GETapi-dao-admin-game-factions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-factions"
                    onclick="cancelTryOut('GETapi-dao-admin-game-factions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-factions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/factions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-factions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-factions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-factions--id-">GET api/dao/admin/game/factions/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-factions--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/factions/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/factions/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-factions--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 27
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Primals&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-factions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-factions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-factions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-factions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-factions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-factions--id-" data-method="GET"
      data-path="api/dao/admin/game/factions/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-factions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-factions--id-"
                    onclick="tryItOut('GETapi-dao-admin-game-factions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-factions--id-"
                    onclick="cancelTryOut('GETapi-dao-admin-game-factions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-factions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/factions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-factions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-factions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-dao-admin-game-factions--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the faction. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-dao-admin-game-factions">POST api/dao/admin/game/factions</h2>

<p>
</p>



<span id="example-requests-POSTapi-dao-admin-game-factions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/api/dao/admin/game/factions" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/factions"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-dao-admin-game-factions">
</span>
<span id="execution-results-POSTapi-dao-admin-game-factions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-dao-admin-game-factions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-dao-admin-game-factions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-dao-admin-game-factions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-dao-admin-game-factions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-dao-admin-game-factions" data-method="POST"
      data-path="api/dao/admin/game/factions"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-dao-admin-game-factions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-dao-admin-game-factions"
                    onclick="tryItOut('POSTapi-dao-admin-game-factions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-dao-admin-game-factions"
                    onclick="cancelTryOut('POSTapi-dao-admin-game-factions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-dao-admin-game-factions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/dao/admin/game/factions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-dao-admin-game-factions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-dao-admin-game-factions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-PUTapi-dao-admin-game-factions--id-">PUT api/dao/admin/game/factions/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-dao-admin-game-factions--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/api/dao/admin/game/factions/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/factions/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-dao-admin-game-factions--id-">
</span>
<span id="execution-results-PUTapi-dao-admin-game-factions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-dao-admin-game-factions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-dao-admin-game-factions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-dao-admin-game-factions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-dao-admin-game-factions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-dao-admin-game-factions--id-" data-method="PUT"
      data-path="api/dao/admin/game/factions/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-dao-admin-game-factions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-dao-admin-game-factions--id-"
                    onclick="tryItOut('PUTapi-dao-admin-game-factions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-dao-admin-game-factions--id-"
                    onclick="cancelTryOut('PUTapi-dao-admin-game-factions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-dao-admin-game-factions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/dao/admin/game/factions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-dao-admin-game-factions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-dao-admin-game-factions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-dao-admin-game-factions--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the faction. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-dao-admin-game-factions--id-">DELETE api/dao/admin/game/factions/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-dao-admin-game-factions--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/api/dao/admin/game/factions/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/factions/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-dao-admin-game-factions--id-">
</span>
<span id="execution-results-DELETEapi-dao-admin-game-factions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-dao-admin-game-factions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-dao-admin-game-factions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-dao-admin-game-factions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-dao-admin-game-factions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-dao-admin-game-factions--id-" data-method="DELETE"
      data-path="api/dao/admin/game/factions/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-dao-admin-game-factions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-dao-admin-game-factions--id-"
                    onclick="tryItOut('DELETEapi-dao-admin-game-factions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-dao-admin-game-factions--id-"
                    onclick="cancelTryOut('DELETEapi-dao-admin-game-factions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-dao-admin-game-factions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/dao/admin/game/factions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-dao-admin-game-factions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-dao-admin-game-factions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-dao-admin-game-factions--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the faction. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-presets">GET api/dao/admin/game/presets</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-presets">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/presets" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/presets"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-presets">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 26
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Running Preset&quot;,
        &quot;description&quot;: &quot;A preset for running parameters.&quot;,
        &quot;image&quot;: null,
        &quot;created_at&quot;: &quot;2024-11-13T11:20:41.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2024-11-13T11:20:41.000000Z&quot;
    },
    {
        &quot;id&quot;: 2,
        &quot;name&quot;: &quot;Running Preset&quot;,
        &quot;description&quot;: &quot;A preset for running parameters.&quot;,
        &quot;image&quot;: &quot;http://example.com/image.png&quot;,
        &quot;created_at&quot;: &quot;2024-11-20T12:44:04.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2024-11-20T12:44:04.000000Z&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-presets" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-presets"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-presets"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-presets" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-presets">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-presets" data-method="GET"
      data-path="api/dao/admin/game/presets"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-presets', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-presets"
                    onclick="tryItOut('GETapi-dao-admin-game-presets');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-presets"
                    onclick="cancelTryOut('GETapi-dao-admin-game-presets');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-presets"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/presets</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-presets"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-presets"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-presets--id-">GET api/dao/admin/game/presets/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-presets--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/presets/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/presets/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-presets--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 25
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;name&quot;: &quot;Running Preset&quot;,
    &quot;description&quot;: &quot;A preset for running parameters.&quot;,
    &quot;image&quot;: null,
    &quot;created_at&quot;: &quot;2024-11-13T11:20:41.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2024-11-13T11:20:41.000000Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-presets--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-presets--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-presets--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-presets--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-presets--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-presets--id-" data-method="GET"
      data-path="api/dao/admin/game/presets/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-presets--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-presets--id-"
                    onclick="tryItOut('GETapi-dao-admin-game-presets--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-presets--id-"
                    onclick="cancelTryOut('GETapi-dao-admin-game-presets--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-presets--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/presets/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-presets--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-presets--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-dao-admin-game-presets--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the preset. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-dao-admin-game-presets">POST api/dao/admin/game/presets</h2>

<p>
</p>



<span id="example-requests-POSTapi-dao-admin-game-presets">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/api/dao/admin/game/presets" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"y\",
    \"description\": \"Qui minus itaque itaque et.\",
    \"image\": \"http:\\/\\/wisozk.biz\\/\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/presets"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "y",
    "description": "Qui minus itaque itaque et.",
    "image": "http:\/\/wisozk.biz\/"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-dao-admin-game-presets">
</span>
<span id="execution-results-POSTapi-dao-admin-game-presets" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-dao-admin-game-presets"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-dao-admin-game-presets"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-dao-admin-game-presets" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-dao-admin-game-presets">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-dao-admin-game-presets" data-method="POST"
      data-path="api/dao/admin/game/presets"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-dao-admin-game-presets', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-dao-admin-game-presets"
                    onclick="tryItOut('POSTapi-dao-admin-game-presets');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-dao-admin-game-presets"
                    onclick="cancelTryOut('POSTapi-dao-admin-game-presets');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-dao-admin-game-presets"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/dao/admin/game/presets</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-dao-admin-game-presets"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-dao-admin-game-presets"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-dao-admin-game-presets"
               value="y"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>y</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-dao-admin-game-presets"
               value="Qui minus itaque itaque et."
               data-component="body">
    <br>
<p>Must not be greater than 1000 characters. Example: <code>Qui minus itaque itaque et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="image"                data-endpoint="POSTapi-dao-admin-game-presets"
               value="http://wisozk.biz/"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://wisozk.biz/</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>parameters</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="parameters[0]"                data-endpoint="POSTapi-dao-admin-game-presets"
               data-component="body">
        <input type="text" style="display: none"
               name="parameters[1]"                data-endpoint="POSTapi-dao-admin-game-presets"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the parameters table.</p>
        </div>
        </form>

                    <h2 id="endpoints-PUTapi-dao-admin-game-presets--id-">PUT api/dao/admin/game/presets/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-dao-admin-game-presets--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/api/dao/admin/game/presets/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"xjpsuhxf\",
    \"description\": \"Temporibus et sit recusandae laudantium id consequatur nihil.\",
    \"image\": \"http:\\/\\/www.greenfelder.org\\/est-et-consequatur-facere-optio-quis-ab\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/presets/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "xjpsuhxf",
    "description": "Temporibus et sit recusandae laudantium id consequatur nihil.",
    "image": "http:\/\/www.greenfelder.org\/est-et-consequatur-facere-optio-quis-ab"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-dao-admin-game-presets--id-">
</span>
<span id="execution-results-PUTapi-dao-admin-game-presets--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-dao-admin-game-presets--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-dao-admin-game-presets--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-dao-admin-game-presets--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-dao-admin-game-presets--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-dao-admin-game-presets--id-" data-method="PUT"
      data-path="api/dao/admin/game/presets/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-dao-admin-game-presets--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-dao-admin-game-presets--id-"
                    onclick="tryItOut('PUTapi-dao-admin-game-presets--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-dao-admin-game-presets--id-"
                    onclick="cancelTryOut('PUTapi-dao-admin-game-presets--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-dao-admin-game-presets--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/dao/admin/game/presets/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-dao-admin-game-presets--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-dao-admin-game-presets--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-dao-admin-game-presets--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the preset. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-dao-admin-game-presets--id-"
               value="xjpsuhxf"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>xjpsuhxf</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-dao-admin-game-presets--id-"
               value="Temporibus et sit recusandae laudantium id consequatur nihil."
               data-component="body">
    <br>
<p>Must not be greater than 1000 characters. Example: <code>Temporibus et sit recusandae laudantium id consequatur nihil.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="image"                data-endpoint="PUTapi-dao-admin-game-presets--id-"
               value="http://www.greenfelder.org/est-et-consequatur-facere-optio-quis-ab"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.greenfelder.org/est-et-consequatur-facere-optio-quis-ab</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>parameters</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="parameters[0]"                data-endpoint="PUTapi-dao-admin-game-presets--id-"
               data-component="body">
        <input type="text" style="display: none"
               name="parameters[1]"                data-endpoint="PUTapi-dao-admin-game-presets--id-"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the parameters table.</p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-dao-admin-game-presets--id-">DELETE api/dao/admin/game/presets/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-dao-admin-game-presets--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/api/dao/admin/game/presets/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/presets/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-dao-admin-game-presets--id-">
</span>
<span id="execution-results-DELETEapi-dao-admin-game-presets--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-dao-admin-game-presets--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-dao-admin-game-presets--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-dao-admin-game-presets--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-dao-admin-game-presets--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-dao-admin-game-presets--id-" data-method="DELETE"
      data-path="api/dao/admin/game/presets/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-dao-admin-game-presets--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-dao-admin-game-presets--id-"
                    onclick="tryItOut('DELETEapi-dao-admin-game-presets--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-dao-admin-game-presets--id-"
                    onclick="cancelTryOut('DELETEapi-dao-admin-game-presets--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-dao-admin-game-presets--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/dao/admin/game/presets/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-dao-admin-game-presets--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-dao-admin-game-presets--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-dao-admin-game-presets--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the preset. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-events">GET api/dao/admin/game/events</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-events">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/events" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/events"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-events">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 24
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 4,
            &quot;title&quot;: &quot;Running Event&quot;,
            &quot;description&quot;: &quot;Event for running parameters.&quot;,
            &quot;start_time&quot;: null,
            &quot;end_time&quot;: null,
            &quot;prize&quot;: &quot;Gold Medal&quot;,
            &quot;filters&quot;: {
                &quot;rarity&quot;: null,
                &quot;gender&quot;: null,
                &quot;faction_id&quot;: null,
                &quot;class&quot;: null
            }
        },
        {
            &quot;id&quot;: 5,
            &quot;title&quot;: &quot;Running Event&quot;,
            &quot;description&quot;: &quot;Event for running parameters.&quot;,
            &quot;start_time&quot;: null,
            &quot;end_time&quot;: null,
            &quot;prize&quot;: &quot;Gold Medal&quot;,
            &quot;filters&quot;: {
                &quot;rarity&quot;: null,
                &quot;gender&quot;: null,
                &quot;faction_id&quot;: null,
                &quot;class&quot;: null
            }
        },
        {
            &quot;id&quot;: 6,
            &quot;title&quot;: &quot;Running Event&quot;,
            &quot;description&quot;: &quot;Event for running parameters.&quot;,
            &quot;start_time&quot;: null,
            &quot;end_time&quot;: null,
            &quot;prize&quot;: &quot;Gold Medal&quot;,
            &quot;filters&quot;: {
                &quot;rarity&quot;: null,
                &quot;gender&quot;: null,
                &quot;faction_id&quot;: null,
                &quot;class&quot;: null
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-events" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-events"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-events"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-events" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-events">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-events" data-method="GET"
      data-path="api/dao/admin/game/events"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-events', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-events"
                    onclick="tryItOut('GETapi-dao-admin-game-events');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-events"
                    onclick="cancelTryOut('GETapi-dao-admin-game-events');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-events"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/events</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-events"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-events"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-dao-admin-game-events">POST api/dao/admin/game/events</h2>

<p>
</p>



<span id="example-requests-POSTapi-dao-admin-game-events">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/api/dao/admin/game/events" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"mrfy\",
    \"description\": \"Quod fuga aut doloremque mollitia enim sed.\",
    \"location_id\": \"totam\",
    \"preset_id\": \"quam\",
    \"start_time\": \"2024-11-22 15:05:00\",
    \"end_time\": \"2096-03-20\",
    \"prize\": \"dolores\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/events"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "mrfy",
    "description": "Quod fuga aut doloremque mollitia enim sed.",
    "location_id": "totam",
    "preset_id": "quam",
    "start_time": "2024-11-22 15:05:00",
    "end_time": "2096-03-20",
    "prize": "dolores"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-dao-admin-game-events">
</span>
<span id="execution-results-POSTapi-dao-admin-game-events" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-dao-admin-game-events"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-dao-admin-game-events"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-dao-admin-game-events" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-dao-admin-game-events">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-dao-admin-game-events" data-method="POST"
      data-path="api/dao/admin/game/events"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-dao-admin-game-events', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-dao-admin-game-events"
                    onclick="tryItOut('POSTapi-dao-admin-game-events');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-dao-admin-game-events"
                    onclick="cancelTryOut('POSTapi-dao-admin-game-events');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-dao-admin-game-events"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/dao/admin/game/events</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-dao-admin-game-events"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-dao-admin-game-events"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTapi-dao-admin-game-events"
               value="mrfy"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>mrfy</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-dao-admin-game-events"
               value="Quod fuga aut doloremque mollitia enim sed."
               data-component="body">
    <br>
<p>Must not be greater than 1000 characters. Example: <code>Quod fuga aut doloremque mollitia enim sed.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>location_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="location_id"                data-endpoint="POSTapi-dao-admin-game-events"
               value="totam"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the locations table. Example: <code>totam</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>preset_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="preset_id"                data-endpoint="POSTapi-dao-admin-game-events"
               value="quam"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the presets table. Example: <code>quam</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_time</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="start_time"                data-endpoint="POSTapi-dao-admin-game-events"
               value="2024-11-22 15:05:00"
               data-component="body">
    <br>
<p>Must be a valid date in the format <code>Y-m-d H:i:s</code>. Example: <code>2024-11-22 15:05:00</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>end_time</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="end_time"                data-endpoint="POSTapi-dao-admin-game-events"
               value="2096-03-20"
               data-component="body">
    <br>
<p>Must be a valid date in the format <code>Y-m-d H:i:s</code>. Must be a date after <code>start_time</code>. Example: <code>2096-03-20</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>prize</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="prize"                data-endpoint="POSTapi-dao-admin-game-events"
               value="dolores"
               data-component="body">
    <br>
<p>Example: <code>dolores</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-events--id-">GET api/dao/admin/game/events/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-events--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/events/4" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/events/4"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-events--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 23
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 4,
        &quot;title&quot;: &quot;Running Event&quot;,
        &quot;description&quot;: &quot;Event for running parameters.&quot;,
        &quot;start_time&quot;: &quot;2024-11-20 12:00:00&quot;,
        &quot;end_time&quot;: &quot;2024-11-20T14:00:00.000000Z&quot;,
        &quot;prize&quot;: &quot;Gold Medal&quot;,
        &quot;created_at&quot;: &quot;2024-11-20T12:58:45.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2024-11-20T12:58:45.000000Z&quot;,
        &quot;time_remaining&quot;: &quot;2 days ago&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-events--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-events--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-events--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-events--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-events--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-events--id-" data-method="GET"
      data-path="api/dao/admin/game/events/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-events--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-events--id-"
                    onclick="tryItOut('GETapi-dao-admin-game-events--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-events--id-"
                    onclick="cancelTryOut('GETapi-dao-admin-game-events--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-events--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/events/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-events--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-events--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-dao-admin-game-events--id-"
               value="4"
               data-component="url">
    <br>
<p>The ID of the event. Example: <code>4</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-dao-admin-game-events--id-">PUT api/dao/admin/game/events/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-dao-admin-game-events--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/api/dao/admin/game/events/4" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"pehegoocmeodmfsaeo\",
    \"description\": \"Et recusandae quaerat id.\",
    \"location_id\": \"aut\",
    \"preset_id\": \"asperiores\",
    \"start_time\": \"2024-11-22 15:05:00\",
    \"end_time\": \"2036-12-28\",
    \"prize\": \"ullam\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/events/4"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "pehegoocmeodmfsaeo",
    "description": "Et recusandae quaerat id.",
    "location_id": "aut",
    "preset_id": "asperiores",
    "start_time": "2024-11-22 15:05:00",
    "end_time": "2036-12-28",
    "prize": "ullam"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-dao-admin-game-events--id-">
</span>
<span id="execution-results-PUTapi-dao-admin-game-events--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-dao-admin-game-events--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-dao-admin-game-events--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-dao-admin-game-events--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-dao-admin-game-events--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-dao-admin-game-events--id-" data-method="PUT"
      data-path="api/dao/admin/game/events/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-dao-admin-game-events--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-dao-admin-game-events--id-"
                    onclick="tryItOut('PUTapi-dao-admin-game-events--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-dao-admin-game-events--id-"
                    onclick="cancelTryOut('PUTapi-dao-admin-game-events--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-dao-admin-game-events--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/dao/admin/game/events/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-dao-admin-game-events--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-dao-admin-game-events--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-dao-admin-game-events--id-"
               value="4"
               data-component="url">
    <br>
<p>The ID of the event. Example: <code>4</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="PUTapi-dao-admin-game-events--id-"
               value="pehegoocmeodmfsaeo"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>pehegoocmeodmfsaeo</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-dao-admin-game-events--id-"
               value="Et recusandae quaerat id."
               data-component="body">
    <br>
<p>Must not be greater than 1000 characters. Example: <code>Et recusandae quaerat id.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>location_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="location_id"                data-endpoint="PUTapi-dao-admin-game-events--id-"
               value="aut"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the locations table. Example: <code>aut</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>preset_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="preset_id"                data-endpoint="PUTapi-dao-admin-game-events--id-"
               value="asperiores"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the presets table. Example: <code>asperiores</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_time</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="start_time"                data-endpoint="PUTapi-dao-admin-game-events--id-"
               value="2024-11-22 15:05:00"
               data-component="body">
    <br>
<p>Must be a valid date in the format <code>Y-m-d H:i:s</code>. Example: <code>2024-11-22 15:05:00</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>end_time</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="end_time"                data-endpoint="PUTapi-dao-admin-game-events--id-"
               value="2036-12-28"
               data-component="body">
    <br>
<p>Must be a valid date in the format <code>Y-m-d H:i:s</code>. Must be a date after <code>start_time</code>. Example: <code>2036-12-28</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>prize</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="prize"                data-endpoint="PUTapi-dao-admin-game-events--id-"
               value="ullam"
               data-component="body">
    <br>
<p>Example: <code>ullam</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-dao-admin-game-events--event_id--go-to-event">Запись пользователя на событие по его id.</h2>

<p>
</p>



<span id="example-requests-POSTapi-dao-admin-game-events--event_id--go-to-event">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/api/dao/admin/game/events/4/go-to-event" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/events/4/go-to-event"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-dao-admin-game-events--event_id--go-to-event">
</span>
<span id="execution-results-POSTapi-dao-admin-game-events--event_id--go-to-event" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-dao-admin-game-events--event_id--go-to-event"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-dao-admin-game-events--event_id--go-to-event"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-dao-admin-game-events--event_id--go-to-event" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-dao-admin-game-events--event_id--go-to-event">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-dao-admin-game-events--event_id--go-to-event" data-method="POST"
      data-path="api/dao/admin/game/events/{event_id}/go-to-event"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-dao-admin-game-events--event_id--go-to-event', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-dao-admin-game-events--event_id--go-to-event"
                    onclick="tryItOut('POSTapi-dao-admin-game-events--event_id--go-to-event');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-dao-admin-game-events--event_id--go-to-event"
                    onclick="cancelTryOut('POSTapi-dao-admin-game-events--event_id--go-to-event');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-dao-admin-game-events--event_id--go-to-event"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/dao/admin/game/events/{event_id}/go-to-event</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-dao-admin-game-events--event_id--go-to-event"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-dao-admin-game-events--event_id--go-to-event"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>event_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="event_id"                data-endpoint="POSTapi-dao-admin-game-events--event_id--go-to-event"
               value="4"
               data-component="url">
    <br>
<p>The ID of the event. Example: <code>4</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-user-inventory">GET api/dao/admin/game/user/inventory</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-user-inventory">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/user/inventory" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/user/inventory"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-user-inventory">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 22
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-user-inventory" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-user-inventory"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-user-inventory"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-user-inventory" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-user-inventory">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-user-inventory" data-method="GET"
      data-path="api/dao/admin/game/user/inventory"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-user-inventory', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-user-inventory"
                    onclick="tryItOut('GETapi-dao-admin-game-user-inventory');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-user-inventory"
                    onclick="cancelTryOut('GETapi-dao-admin-game-user-inventory');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-user-inventory"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/user/inventory</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-user-inventory"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-user-inventory"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-user-character--tokenId-">GET api/dao/admin/game/user/character/{tokenId}</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-user-character--tokenId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/user/character/itaque" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/user/character/itaque"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-user-character--tokenId-">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 21
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-user-character--tokenId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-user-character--tokenId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-user-character--tokenId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-user-character--tokenId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-user-character--tokenId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-user-character--tokenId-" data-method="GET"
      data-path="api/dao/admin/game/user/character/{tokenId}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-user-character--tokenId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-user-character--tokenId-"
                    onclick="tryItOut('GETapi-dao-admin-game-user-character--tokenId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-user-character--tokenId-"
                    onclick="cancelTryOut('GETapi-dao-admin-game-user-character--tokenId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-user-character--tokenId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/user/character/{tokenId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-user-character--tokenId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-user-character--tokenId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>tokenId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tokenId"                data-endpoint="GETapi-dao-admin-game-user-character--tokenId-"
               value="itaque"
               data-component="url">
    <br>
<p>Example: <code>itaque</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-user-village--tokenId-">GET api/dao/admin/game/user/village/{tokenId}</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-user-village--tokenId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/user/village/dolorem" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/user/village/dolorem"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-user-village--tokenId-">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 20
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-user-village--tokenId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-user-village--tokenId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-user-village--tokenId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-user-village--tokenId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-user-village--tokenId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-user-village--tokenId-" data-method="GET"
      data-path="api/dao/admin/game/user/village/{tokenId}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-user-village--tokenId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-user-village--tokenId-"
                    onclick="tryItOut('GETapi-dao-admin-game-user-village--tokenId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-user-village--tokenId-"
                    onclick="cancelTryOut('GETapi-dao-admin-game-user-village--tokenId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-user-village--tokenId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/user/village/{tokenId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-user-village--tokenId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-user-village--tokenId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>tokenId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tokenId"                data-endpoint="GETapi-dao-admin-game-user-village--tokenId-"
               value="dolorem"
               data-component="url">
    <br>
<p>Example: <code>dolorem</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-cards--id-">GET api/dao/admin/game/cards/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-cards--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/cards/at" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/cards/at"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-cards--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 19
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-cards--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-cards--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-cards--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-cards--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-cards--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-cards--id-" data-method="GET"
      data-path="api/dao/admin/game/cards/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-cards--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-cards--id-"
                    onclick="tryItOut('GETapi-dao-admin-game-cards--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-cards--id-"
                    onclick="cancelTryOut('GETapi-dao-admin-game-cards--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-cards--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/cards/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-cards--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-cards--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-dao-admin-game-cards--id-"
               value="at"
               data-component="url">
    <br>
<p>The ID of the card. Example: <code>at</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-dao-admin-game-squad-add--cardId-">POST api/dao/admin/game/squad/add/{cardId}</h2>

<p>
</p>



<span id="example-requests-POSTapi-dao-admin-game-squad-add--cardId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/api/dao/admin/game/squad/add/est" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/squad/add/est"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-dao-admin-game-squad-add--cardId-">
</span>
<span id="execution-results-POSTapi-dao-admin-game-squad-add--cardId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-dao-admin-game-squad-add--cardId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-dao-admin-game-squad-add--cardId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-dao-admin-game-squad-add--cardId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-dao-admin-game-squad-add--cardId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-dao-admin-game-squad-add--cardId-" data-method="POST"
      data-path="api/dao/admin/game/squad/add/{cardId}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-dao-admin-game-squad-add--cardId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-dao-admin-game-squad-add--cardId-"
                    onclick="tryItOut('POSTapi-dao-admin-game-squad-add--cardId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-dao-admin-game-squad-add--cardId-"
                    onclick="cancelTryOut('POSTapi-dao-admin-game-squad-add--cardId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-dao-admin-game-squad-add--cardId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/dao/admin/game/squad/add/{cardId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-dao-admin-game-squad-add--cardId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-dao-admin-game-squad-add--cardId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>cardId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="cardId"                data-endpoint="POSTapi-dao-admin-game-squad-add--cardId-"
               value="est"
               data-component="url">
    <br>
<p>Example: <code>est</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-dao-admin-game-squad-remove--cardId-">DELETE api/dao/admin/game/squad/remove/{cardId}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-dao-admin-game-squad-remove--cardId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/api/dao/admin/game/squad/remove/in" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/squad/remove/in"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-dao-admin-game-squad-remove--cardId-">
</span>
<span id="execution-results-DELETEapi-dao-admin-game-squad-remove--cardId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-dao-admin-game-squad-remove--cardId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-dao-admin-game-squad-remove--cardId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-dao-admin-game-squad-remove--cardId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-dao-admin-game-squad-remove--cardId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-dao-admin-game-squad-remove--cardId-" data-method="DELETE"
      data-path="api/dao/admin/game/squad/remove/{cardId}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-dao-admin-game-squad-remove--cardId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-dao-admin-game-squad-remove--cardId-"
                    onclick="tryItOut('DELETEapi-dao-admin-game-squad-remove--cardId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-dao-admin-game-squad-remove--cardId-"
                    onclick="cancelTryOut('DELETEapi-dao-admin-game-squad-remove--cardId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-dao-admin-game-squad-remove--cardId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/dao/admin/game/squad/remove/{cardId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-dao-admin-game-squad-remove--cardId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-dao-admin-game-squad-remove--cardId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>cardId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="cardId"                data-endpoint="DELETEapi-dao-admin-game-squad-remove--cardId-"
               value="in"
               data-component="url">
    <br>
<p>Example: <code>in</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-events-users--event_id-">GET api/dao/admin/game/events/users/{event_id}</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-events-users--event_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/events/users/4" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/events/users/4"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-events-users--event_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 18
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthorized&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-events-users--event_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-events-users--event_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-events-users--event_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-events-users--event_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-events-users--event_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-events-users--event_id-" data-method="GET"
      data-path="api/dao/admin/game/events/users/{event_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-events-users--event_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-events-users--event_id-"
                    onclick="tryItOut('GETapi-dao-admin-game-events-users--event_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-events-users--event_id-"
                    onclick="cancelTryOut('GETapi-dao-admin-game-events-users--event_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-events-users--event_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/events/users/{event_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-events-users--event_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-events-users--event_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>event_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="event_id"                data-endpoint="GETapi-dao-admin-game-events-users--event_id-"
               value="4"
               data-component="url">
    <br>
<p>The ID of the event. Example: <code>4</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-squad-search">GET api/dao/admin/game/squad/search</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-squad-search">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/squad/search" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/squad/search"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-squad-search">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 17
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;error&quot;: &quot;Unauthorized&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-squad-search" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-squad-search"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-squad-search"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-squad-search" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-squad-search">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-squad-search" data-method="GET"
      data-path="api/dao/admin/game/squad/search"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-squad-search', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-squad-search"
                    onclick="tryItOut('GETapi-dao-admin-game-squad-search');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-squad-search"
                    onclick="cancelTryOut('GETapi-dao-admin-game-squad-search');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-squad-search"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/squad/search</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-squad-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-squad-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-battle-rules">GET api/dao/admin/game/battle-rules</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-battle-rules">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/battle-rules" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/battle-rules"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-battle-rules">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 16
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 39,
        &quot;level_difference&quot;: -9,
        &quot;victim_frozen_duration&quot;: 10,
        &quot;attacker_frozen_duration&quot;: 5760,
        &quot;attacker_win_cups&quot;: 100,
        &quot;attacker_lose_cups&quot;: -1,
        &quot;victim_win_cups&quot;: 1,
        &quot;victim_lose_cups&quot;: -14,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id&quot;: 40,
        &quot;level_difference&quot;: -8,
        &quot;victim_frozen_duration&quot;: 10,
        &quot;attacker_frozen_duration&quot;: 4320,
        &quot;attacker_win_cups&quot;: 80,
        &quot;attacker_lose_cups&quot;: -1,
        &quot;victim_win_cups&quot;: 1,
        &quot;victim_lose_cups&quot;: -28,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id&quot;: 41,
        &quot;level_difference&quot;: -7,
        &quot;victim_frozen_duration&quot;: 10,
        &quot;attacker_frozen_duration&quot;: 2880,
        &quot;attacker_win_cups&quot;: 70,
        &quot;attacker_lose_cups&quot;: -1,
        &quot;victim_win_cups&quot;: 1,
        &quot;victim_lose_cups&quot;: -24,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id&quot;: 42,
        &quot;level_difference&quot;: -6,
        &quot;victim_frozen_duration&quot;: 10,
        &quot;attacker_frozen_duration&quot;: 1440,
        &quot;attacker_win_cups&quot;: 50,
        &quot;attacker_lose_cups&quot;: -1,
        &quot;victim_win_cups&quot;: 1,
        &quot;victim_lose_cups&quot;: -20,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id&quot;: 43,
        &quot;level_difference&quot;: -5,
        &quot;victim_frozen_duration&quot;: 10,
        &quot;attacker_frozen_duration&quot;: 720,
        &quot;attacker_win_cups&quot;: 40,
        &quot;attacker_lose_cups&quot;: -1,
        &quot;victim_win_cups&quot;: 1,
        &quot;victim_lose_cups&quot;: -14,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id&quot;: 44,
        &quot;level_difference&quot;: -4,
        &quot;victim_frozen_duration&quot;: 10,
        &quot;attacker_frozen_duration&quot;: 240,
        &quot;attacker_win_cups&quot;: 25,
        &quot;attacker_lose_cups&quot;: -1,
        &quot;victim_win_cups&quot;: 1,
        &quot;victim_lose_cups&quot;: -10,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id&quot;: 45,
        &quot;level_difference&quot;: -3,
        &quot;victim_frozen_duration&quot;: 10,
        &quot;attacker_frozen_duration&quot;: 120,
        &quot;attacker_win_cups&quot;: 15,
        &quot;attacker_lose_cups&quot;: -1,
        &quot;victim_win_cups&quot;: 1,
        &quot;victim_lose_cups&quot;: -8,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id&quot;: 46,
        &quot;level_difference&quot;: -2,
        &quot;victim_frozen_duration&quot;: 10,
        &quot;attacker_frozen_duration&quot;: 60,
        &quot;attacker_win_cups&quot;: 8,
        &quot;attacker_lose_cups&quot;: -1,
        &quot;victim_win_cups&quot;: 1,
        &quot;victim_lose_cups&quot;: -6,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id&quot;: 47,
        &quot;level_difference&quot;: -1,
        &quot;victim_frozen_duration&quot;: 10,
        &quot;attacker_frozen_duration&quot;: 30,
        &quot;attacker_win_cups&quot;: 2,
        &quot;attacker_lose_cups&quot;: -1,
        &quot;victim_win_cups&quot;: 1,
        &quot;victim_lose_cups&quot;: -4,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id&quot;: 48,
        &quot;level_difference&quot;: 0,
        &quot;victim_frozen_duration&quot;: 10,
        &quot;attacker_frozen_duration&quot;: 10,
        &quot;attacker_win_cups&quot;: 1,
        &quot;attacker_lose_cups&quot;: -1,
        &quot;victim_win_cups&quot;: 1,
        &quot;victim_lose_cups&quot;: -2,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id&quot;: 49,
        &quot;level_difference&quot;: 1,
        &quot;victim_frozen_duration&quot;: 30,
        &quot;attacker_frozen_duration&quot;: 10,
        &quot;attacker_win_cups&quot;: 1,
        &quot;attacker_lose_cups&quot;: -2,
        &quot;victim_win_cups&quot;: 1,
        &quot;victim_lose_cups&quot;: -1,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id&quot;: 50,
        &quot;level_difference&quot;: 2,
        &quot;victim_frozen_duration&quot;: 60,
        &quot;attacker_frozen_duration&quot;: 10,
        &quot;attacker_win_cups&quot;: 1,
        &quot;attacker_lose_cups&quot;: -4,
        &quot;victim_win_cups&quot;: 2,
        &quot;victim_lose_cups&quot;: -1,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id&quot;: 51,
        &quot;level_difference&quot;: 3,
        &quot;victim_frozen_duration&quot;: 120,
        &quot;attacker_frozen_duration&quot;: 10,
        &quot;attacker_win_cups&quot;: 1,
        &quot;attacker_lose_cups&quot;: -6,
        &quot;victim_win_cups&quot;: 8,
        &quot;victim_lose_cups&quot;: -1,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id&quot;: 52,
        &quot;level_difference&quot;: 4,
        &quot;victim_frozen_duration&quot;: 240,
        &quot;attacker_frozen_duration&quot;: 10,
        &quot;attacker_win_cups&quot;: 1,
        &quot;attacker_lose_cups&quot;: -8,
        &quot;victim_win_cups&quot;: 15,
        &quot;victim_lose_cups&quot;: -1,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id&quot;: 53,
        &quot;level_difference&quot;: 5,
        &quot;victim_frozen_duration&quot;: 720,
        &quot;attacker_frozen_duration&quot;: 10,
        &quot;attacker_win_cups&quot;: 1,
        &quot;attacker_lose_cups&quot;: -10,
        &quot;victim_win_cups&quot;: 25,
        &quot;victim_lose_cups&quot;: -1,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id&quot;: 54,
        &quot;level_difference&quot;: 6,
        &quot;victim_frozen_duration&quot;: 2880,
        &quot;attacker_frozen_duration&quot;: 10,
        &quot;attacker_win_cups&quot;: 1,
        &quot;attacker_lose_cups&quot;: -14,
        &quot;victim_win_cups&quot;: 40,
        &quot;victim_lose_cups&quot;: -1,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id&quot;: 55,
        &quot;level_difference&quot;: 7,
        &quot;victim_frozen_duration&quot;: 5760,
        &quot;attacker_frozen_duration&quot;: 10,
        &quot;attacker_win_cups&quot;: 1,
        &quot;attacker_lose_cups&quot;: -20,
        &quot;victim_win_cups&quot;: 50,
        &quot;victim_lose_cups&quot;: -1,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id&quot;: 56,
        &quot;level_difference&quot;: 8,
        &quot;victim_frozen_duration&quot;: 11520,
        &quot;attacker_frozen_duration&quot;: 10,
        &quot;attacker_win_cups&quot;: 1,
        &quot;attacker_lose_cups&quot;: -24,
        &quot;victim_win_cups&quot;: 70,
        &quot;victim_lose_cups&quot;: -1,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;id&quot;: 57,
        &quot;level_difference&quot;: 9,
        &quot;victim_frozen_duration&quot;: 17280,
        &quot;attacker_frozen_duration&quot;: 10,
        &quot;attacker_win_cups&quot;: 1,
        &quot;attacker_lose_cups&quot;: -28,
        &quot;victim_win_cups&quot;: 80,
        &quot;victim_lose_cups&quot;: -1,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-battle-rules" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-battle-rules"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-battle-rules"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-battle-rules" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-battle-rules">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-battle-rules" data-method="GET"
      data-path="api/dao/admin/game/battle-rules"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-battle-rules', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-battle-rules"
                    onclick="tryItOut('GETapi-dao-admin-game-battle-rules');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-battle-rules"
                    onclick="cancelTryOut('GETapi-dao-admin-game-battle-rules');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-battle-rules"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/battle-rules</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-battle-rules"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-battle-rules"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-battle-rules--id-">GET api/dao/admin/game/battle-rules/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-battle-rules--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/battle-rules/39" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/battle-rules/39"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-battle-rules--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 15
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 39,
    &quot;level_difference&quot;: -9,
    &quot;victim_frozen_duration&quot;: 10,
    &quot;attacker_frozen_duration&quot;: 5760,
    &quot;attacker_win_cups&quot;: 100,
    &quot;attacker_lose_cups&quot;: -1,
    &quot;victim_win_cups&quot;: 1,
    &quot;victim_lose_cups&quot;: -14,
    &quot;created_at&quot;: null,
    &quot;updated_at&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-battle-rules--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-battle-rules--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-battle-rules--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-battle-rules--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-battle-rules--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-battle-rules--id-" data-method="GET"
      data-path="api/dao/admin/game/battle-rules/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-battle-rules--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-battle-rules--id-"
                    onclick="tryItOut('GETapi-dao-admin-game-battle-rules--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-battle-rules--id-"
                    onclick="cancelTryOut('GETapi-dao-admin-game-battle-rules--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-battle-rules--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/battle-rules/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-battle-rules--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-battle-rules--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-dao-admin-game-battle-rules--id-"
               value="39"
               data-component="url">
    <br>
<p>The ID of the battle rule. Example: <code>39</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-dao-admin-game-battle-rules--id-">PUT api/dao/admin/game/battle-rules/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-dao-admin-game-battle-rules--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/api/dao/admin/game/battle-rules/39" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/battle-rules/39"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-dao-admin-game-battle-rules--id-">
</span>
<span id="execution-results-PUTapi-dao-admin-game-battle-rules--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-dao-admin-game-battle-rules--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-dao-admin-game-battle-rules--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-dao-admin-game-battle-rules--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-dao-admin-game-battle-rules--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-dao-admin-game-battle-rules--id-" data-method="PUT"
      data-path="api/dao/admin/game/battle-rules/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-dao-admin-game-battle-rules--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-dao-admin-game-battle-rules--id-"
                    onclick="tryItOut('PUTapi-dao-admin-game-battle-rules--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-dao-admin-game-battle-rules--id-"
                    onclick="cancelTryOut('PUTapi-dao-admin-game-battle-rules--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-dao-admin-game-battle-rules--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/dao/admin/game/battle-rules/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-dao-admin-game-battle-rules--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-dao-admin-game-battle-rules--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-dao-admin-game-battle-rules--id-"
               value="39"
               data-component="url">
    <br>
<p>The ID of the battle rule. Example: <code>39</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-parameters">GET api/dao/admin/game/parameters</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-parameters">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/parameters" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/parameters"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-parameters">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 14
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;trait_type&quot;: &quot;Initiative&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;trait_type&quot;: &quot;Movement speed&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;trait_type&quot;: &quot;Search diameter&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;trait_type&quot;: &quot;Laziness&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;trait_type&quot;: &quot;Search&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;trait_type&quot;: &quot;Gather&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;trait_type&quot;: &quot;Combat diameter&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;trait_type&quot;: &quot;Damage&quot;
        },
        {
            &quot;id&quot;: 9,
            &quot;trait_type&quot;: &quot;Shield&quot;
        },
        {
            &quot;id&quot;: 10,
            &quot;trait_type&quot;: &quot;Health&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-parameters" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-parameters"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-parameters"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-parameters" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-parameters">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-parameters" data-method="GET"
      data-path="api/dao/admin/game/parameters"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-parameters', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-parameters"
                    onclick="tryItOut('GETapi-dao-admin-game-parameters');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-parameters"
                    onclick="cancelTryOut('GETapi-dao-admin-game-parameters');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-parameters"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/parameters</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-parameters"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-parameters"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-leagues">GET api/dao/admin/game/leagues</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-leagues">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/leagues" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/leagues"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-leagues">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 13
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;League of Pioneers&quot;,
            &quot;cups_from&quot;: 0,
            &quot;cups_to&quot;: 10
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Novice League&quot;,
            &quot;cups_from&quot;: 11,
            &quot;cups_to&quot;: 20
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;League of Daredevils&quot;,
            &quot;cups_from&quot;: 21,
            &quot;cups_to&quot;: 30
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;League of Ambitions&quot;,
            &quot;cups_from&quot;: 31,
            &quot;cups_to&quot;: 40
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Expert League&quot;,
            &quot;cups_from&quot;: 41,
            &quot;cups_to&quot;: 60
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Master League&quot;,
            &quot;cups_from&quot;: 61,
            &quot;cups_to&quot;: 80
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;League of Stars&quot;,
            &quot;cups_from&quot;: 81,
            &quot;cups_to&quot;: 100
        },
        {
            &quot;id&quot;: 8,
            &quot;name&quot;: &quot;Veteran League&quot;,
            &quot;cups_from&quot;: 101,
            &quot;cups_to&quot;: 150
        },
        {
            &quot;id&quot;: 9,
            &quot;name&quot;: &quot;Champions League&quot;,
            &quot;cups_from&quot;: 151,
            &quot;cups_to&quot;: 200
        },
        {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;Raiders League&quot;,
            &quot;cups_from&quot;: 201,
            &quot;cups_to&quot;: 999999
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-leagues" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-leagues"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-leagues"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-leagues" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-leagues">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-leagues" data-method="GET"
      data-path="api/dao/admin/game/leagues"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-leagues', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-leagues"
                    onclick="tryItOut('GETapi-dao-admin-game-leagues');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-leagues"
                    onclick="cancelTryOut('GETapi-dao-admin-game-leagues');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-leagues"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/leagues</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-leagues"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-leagues"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-dao-admin-game-leagues">POST api/dao/admin/game/leagues</h2>

<p>
</p>



<span id="example-requests-POSTapi-dao-admin-game-leagues">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/api/dao/admin/game/leagues" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"ucnggnnikrzwv\",
    \"cups_from\": 5,
    \"cups_to\": 10
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/leagues"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "ucnggnnikrzwv",
    "cups_from": 5,
    "cups_to": 10
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-dao-admin-game-leagues">
</span>
<span id="execution-results-POSTapi-dao-admin-game-leagues" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-dao-admin-game-leagues"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-dao-admin-game-leagues"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-dao-admin-game-leagues" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-dao-admin-game-leagues">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-dao-admin-game-leagues" data-method="POST"
      data-path="api/dao/admin/game/leagues"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-dao-admin-game-leagues', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-dao-admin-game-leagues"
                    onclick="tryItOut('POSTapi-dao-admin-game-leagues');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-dao-admin-game-leagues"
                    onclick="cancelTryOut('POSTapi-dao-admin-game-leagues');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-dao-admin-game-leagues"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/dao/admin/game/leagues</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-dao-admin-game-leagues"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-dao-admin-game-leagues"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-dao-admin-game-leagues"
               value="ucnggnnikrzwv"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>ucnggnnikrzwv</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cups_from</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="cups_from"                data-endpoint="POSTapi-dao-admin-game-leagues"
               value="5"
               data-component="body">
    <br>
<p>Example: <code>5</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cups_to</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="cups_to"                data-endpoint="POSTapi-dao-admin-game-leagues"
               value="10"
               data-component="body">
    <br>
<p>Example: <code>10</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-leagues--id-">GET api/dao/admin/game/leagues/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-leagues--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/leagues/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/leagues/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-leagues--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 12
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;League of Pioneers&quot;,
        &quot;cups_from&quot;: 0,
        &quot;cups_to&quot;: 10
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-leagues--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-leagues--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-leagues--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-leagues--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-leagues--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-leagues--id-" data-method="GET"
      data-path="api/dao/admin/game/leagues/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-leagues--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-leagues--id-"
                    onclick="tryItOut('GETapi-dao-admin-game-leagues--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-leagues--id-"
                    onclick="cancelTryOut('GETapi-dao-admin-game-leagues--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-leagues--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/leagues/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-leagues--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-leagues--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-dao-admin-game-leagues--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the league. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-dao-admin-game-leagues--id-">PUT api/dao/admin/game/leagues/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-dao-admin-game-leagues--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/api/dao/admin/game/leagues/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"uthjytnkjtbpcg\",
    \"cups_from\": 15,
    \"cups_to\": 3
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/leagues/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "uthjytnkjtbpcg",
    "cups_from": 15,
    "cups_to": 3
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-dao-admin-game-leagues--id-">
</span>
<span id="execution-results-PUTapi-dao-admin-game-leagues--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-dao-admin-game-leagues--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-dao-admin-game-leagues--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-dao-admin-game-leagues--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-dao-admin-game-leagues--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-dao-admin-game-leagues--id-" data-method="PUT"
      data-path="api/dao/admin/game/leagues/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-dao-admin-game-leagues--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-dao-admin-game-leagues--id-"
                    onclick="tryItOut('PUTapi-dao-admin-game-leagues--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-dao-admin-game-leagues--id-"
                    onclick="cancelTryOut('PUTapi-dao-admin-game-leagues--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-dao-admin-game-leagues--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/dao/admin/game/leagues/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/dao/admin/game/leagues/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-dao-admin-game-leagues--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-dao-admin-game-leagues--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-dao-admin-game-leagues--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the league. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-dao-admin-game-leagues--id-"
               value="uthjytnkjtbpcg"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>uthjytnkjtbpcg</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cups_from</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="cups_from"                data-endpoint="PUTapi-dao-admin-game-leagues--id-"
               value="15"
               data-component="body">
    <br>
<p>Example: <code>15</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cups_to</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="cups_to"                data-endpoint="PUTapi-dao-admin-game-leagues--id-"
               value="3"
               data-component="body">
    <br>
<p>Example: <code>3</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-dao-admin-game-leagues--id-">DELETE api/dao/admin/game/leagues/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-dao-admin-game-leagues--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/api/dao/admin/game/leagues/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/leagues/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-dao-admin-game-leagues--id-">
</span>
<span id="execution-results-DELETEapi-dao-admin-game-leagues--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-dao-admin-game-leagues--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-dao-admin-game-leagues--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-dao-admin-game-leagues--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-dao-admin-game-leagues--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-dao-admin-game-leagues--id-" data-method="DELETE"
      data-path="api/dao/admin/game/leagues/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-dao-admin-game-leagues--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-dao-admin-game-leagues--id-"
                    onclick="tryItOut('DELETEapi-dao-admin-game-leagues--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-dao-admin-game-leagues--id-"
                    onclick="cancelTryOut('DELETEapi-dao-admin-game-leagues--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-dao-admin-game-leagues--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/dao/admin/game/leagues/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-dao-admin-game-leagues--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-dao-admin-game-leagues--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-dao-admin-game-leagues--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the league. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-dao-admin-game-battles">POST api/dao/admin/game/battles</h2>

<p>
</p>



<span id="example-requests-POSTapi-dao-admin-game-battles">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/api/dao/admin/game/battles" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/battles"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-dao-admin-game-battles">
</span>
<span id="execution-results-POSTapi-dao-admin-game-battles" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-dao-admin-game-battles"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-dao-admin-game-battles"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-dao-admin-game-battles" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-dao-admin-game-battles">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-dao-admin-game-battles" data-method="POST"
      data-path="api/dao/admin/game/battles"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-dao-admin-game-battles', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-dao-admin-game-battles"
                    onclick="tryItOut('POSTapi-dao-admin-game-battles');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-dao-admin-game-battles"
                    onclick="cancelTryOut('POSTapi-dao-admin-game-battles');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-dao-admin-game-battles"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/dao/admin/game/battles</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-dao-admin-game-battles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-dao-admin-game-battles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-battles--battle_id-">GET api/dao/admin/game/battles/{battle_id}</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-battles--battle_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/battles/ut" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/battles/ut"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-battles--battle_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 11
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;headers&quot;: {},
    &quot;original&quot;: {
        &quot;message&quot;: &quot;Failed to fetch battle status.&quot;,
        &quot;error&quot;: &quot;No query results for model [App\\Models\\Battle] ut&quot;
    },
    &quot;exception&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-battles--battle_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-battles--battle_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-battles--battle_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-battles--battle_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-battles--battle_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-battles--battle_id-" data-method="GET"
      data-path="api/dao/admin/game/battles/{battle_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-battles--battle_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-battles--battle_id-"
                    onclick="tryItOut('GETapi-dao-admin-game-battles--battle_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-battles--battle_id-"
                    onclick="cancelTryOut('GETapi-dao-admin-game-battles--battle_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-battles--battle_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/battles/{battle_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-battles--battle_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-battles--battle_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>battle_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="battle_id"                data-endpoint="GETapi-dao-admin-game-battles--battle_id-"
               value="ut"
               data-component="url">
    <br>
<p>The ID of the battle. Example: <code>ut</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-dao-admin-game-battles-perform--battle_id-">POST api/dao/admin/game/battles/perform/{battle_id}</h2>

<p>
</p>



<span id="example-requests-POSTapi-dao-admin-game-battles-perform--battle_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/api/dao/admin/game/battles/perform/quo" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/battles/perform/quo"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-dao-admin-game-battles-perform--battle_id-">
</span>
<span id="execution-results-POSTapi-dao-admin-game-battles-perform--battle_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-dao-admin-game-battles-perform--battle_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-dao-admin-game-battles-perform--battle_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-dao-admin-game-battles-perform--battle_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-dao-admin-game-battles-perform--battle_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-dao-admin-game-battles-perform--battle_id-" data-method="POST"
      data-path="api/dao/admin/game/battles/perform/{battle_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-dao-admin-game-battles-perform--battle_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-dao-admin-game-battles-perform--battle_id-"
                    onclick="tryItOut('POSTapi-dao-admin-game-battles-perform--battle_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-dao-admin-game-battles-perform--battle_id-"
                    onclick="cancelTryOut('POSTapi-dao-admin-game-battles-perform--battle_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-dao-admin-game-battles-perform--battle_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/dao/admin/game/battles/perform/{battle_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-dao-admin-game-battles-perform--battle_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-dao-admin-game-battles-perform--battle_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>battle_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="battle_id"                data-endpoint="POSTapi-dao-admin-game-battles-perform--battle_id-"
               value="quo"
               data-component="url">
    <br>
<p>The ID of the battle. Example: <code>quo</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-dao-admin-game-battles--battle_id--logs">GET api/dao/admin/game/battles/{battle_id}/logs</h2>

<p>
</p>



<span id="example-requests-GETapi-dao-admin-game-battles--battle_id--logs">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/dao/admin/game/battles/1/logs" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/battles/1/logs"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dao-admin-game-battles--battle_id--logs">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 10
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dao-admin-game-battles--battle_id--logs" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dao-admin-game-battles--battle_id--logs"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dao-admin-game-battles--battle_id--logs"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dao-admin-game-battles--battle_id--logs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dao-admin-game-battles--battle_id--logs">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dao-admin-game-battles--battle_id--logs" data-method="GET"
      data-path="api/dao/admin/game/battles/{battle_id}/logs"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dao-admin-game-battles--battle_id--logs', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dao-admin-game-battles--battle_id--logs"
                    onclick="tryItOut('GETapi-dao-admin-game-battles--battle_id--logs');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dao-admin-game-battles--battle_id--logs"
                    onclick="cancelTryOut('GETapi-dao-admin-game-battles--battle_id--logs');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dao-admin-game-battles--battle_id--logs"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dao/admin/game/battles/{battle_id}/logs</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dao-admin-game-battles--battle_id--logs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dao-admin-game-battles--battle_id--logs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>battle_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="battle_id"                data-endpoint="GETapi-dao-admin-game-battles--battle_id--logs"
               value="1"
               data-component="url">
    <br>
<p>The ID of the battle. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-dao-admin-game-cards--card_id--freeze">POST api/dao/admin/game/cards/{card_id}/freeze</h2>

<p>
</p>



<span id="example-requests-POSTapi-dao-admin-game-cards--card_id--freeze">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/api/dao/admin/game/cards/1/freeze" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"freeze_duration\": 73
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/cards/1/freeze"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "freeze_duration": 73
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-dao-admin-game-cards--card_id--freeze">
</span>
<span id="execution-results-POSTapi-dao-admin-game-cards--card_id--freeze" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-dao-admin-game-cards--card_id--freeze"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-dao-admin-game-cards--card_id--freeze"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-dao-admin-game-cards--card_id--freeze" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-dao-admin-game-cards--card_id--freeze">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-dao-admin-game-cards--card_id--freeze" data-method="POST"
      data-path="api/dao/admin/game/cards/{card_id}/freeze"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-dao-admin-game-cards--card_id--freeze', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-dao-admin-game-cards--card_id--freeze"
                    onclick="tryItOut('POSTapi-dao-admin-game-cards--card_id--freeze');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-dao-admin-game-cards--card_id--freeze"
                    onclick="cancelTryOut('POSTapi-dao-admin-game-cards--card_id--freeze');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-dao-admin-game-cards--card_id--freeze"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/dao/admin/game/cards/{card_id}/freeze</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-dao-admin-game-cards--card_id--freeze"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-dao-admin-game-cards--card_id--freeze"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>card_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="card_id"                data-endpoint="POSTapi-dao-admin-game-cards--card_id--freeze"
               value="1"
               data-component="url">
    <br>
<p>The ID of the card. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>freeze_duration</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="freeze_duration"                data-endpoint="POSTapi-dao-admin-game-cards--card_id--freeze"
               value="73"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>73</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-dao-admin-game-cards--card_id--unfreeze">POST api/dao/admin/game/cards/{card_id}/unfreeze</h2>

<p>
</p>



<span id="example-requests-POSTapi-dao-admin-game-cards--card_id--unfreeze">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/api/dao/admin/game/cards/1/unfreeze" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/cards/1/unfreeze"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-dao-admin-game-cards--card_id--unfreeze">
</span>
<span id="execution-results-POSTapi-dao-admin-game-cards--card_id--unfreeze" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-dao-admin-game-cards--card_id--unfreeze"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-dao-admin-game-cards--card_id--unfreeze"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-dao-admin-game-cards--card_id--unfreeze" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-dao-admin-game-cards--card_id--unfreeze">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-dao-admin-game-cards--card_id--unfreeze" data-method="POST"
      data-path="api/dao/admin/game/cards/{card_id}/unfreeze"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-dao-admin-game-cards--card_id--unfreeze', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-dao-admin-game-cards--card_id--unfreeze"
                    onclick="tryItOut('POSTapi-dao-admin-game-cards--card_id--unfreeze');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-dao-admin-game-cards--card_id--unfreeze"
                    onclick="cancelTryOut('POSTapi-dao-admin-game-cards--card_id--unfreeze');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-dao-admin-game-cards--card_id--unfreeze"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/dao/admin/game/cards/{card_id}/unfreeze</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-dao-admin-game-cards--card_id--unfreeze"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-dao-admin-game-cards--card_id--unfreeze"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>card_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="card_id"                data-endpoint="POSTapi-dao-admin-game-cards--card_id--unfreeze"
               value="1"
               data-component="url">
    <br>
<p>The ID of the card. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PATCHapi-dao-admin-game-users--user_id--update_league_points">PATCH api/dao/admin/game/users/{user_id}/update_league_points</h2>

<p>
</p>



<span id="example-requests-PATCHapi-dao-admin-game-users--user_id--update_league_points">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://127.0.0.1:8000/api/api/dao/admin/game/users/ducimus/update_league_points" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"league_points\": 15
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/dao/admin/game/users/ducimus/update_league_points"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "league_points": 15
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHapi-dao-admin-game-users--user_id--update_league_points">
</span>
<span id="execution-results-PATCHapi-dao-admin-game-users--user_id--update_league_points" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-dao-admin-game-users--user_id--update_league_points"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-dao-admin-game-users--user_id--update_league_points"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-dao-admin-game-users--user_id--update_league_points" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-dao-admin-game-users--user_id--update_league_points">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-dao-admin-game-users--user_id--update_league_points" data-method="PATCH"
      data-path="api/dao/admin/game/users/{user_id}/update_league_points"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-dao-admin-game-users--user_id--update_league_points', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-dao-admin-game-users--user_id--update_league_points"
                    onclick="tryItOut('PATCHapi-dao-admin-game-users--user_id--update_league_points');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-dao-admin-game-users--user_id--update_league_points"
                    onclick="cancelTryOut('PATCHapi-dao-admin-game-users--user_id--update_league_points');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-dao-admin-game-users--user_id--update_league_points"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/dao/admin/game/users/{user_id}/update_league_points</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-dao-admin-game-users--user_id--update_league_points"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-dao-admin-game-users--user_id--update_league_points"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="user_id"                data-endpoint="PATCHapi-dao-admin-game-users--user_id--update_league_points"
               value="ducimus"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>ducimus</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>league_points</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="league_points"                data-endpoint="PATCHapi-dao-admin-game-users--user_id--update_league_points"
               value="15"
               data-component="body">
    <br>
<p>Example: <code>15</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-user">GET api/user</h2>

<p>
</p>



<span id="example-requests-GETapi-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/user"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 9
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;токена нема&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-user" data-method="GET"
      data-path="api/user"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user"
                    onclick="tryItOut('GETapi-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user"
                    onclick="cancelTryOut('GETapi-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-auth-metamask">POST api/auth/metamask</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-metamask">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/api/auth/metamask" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"from\": \"tempora\",
    \"signature\": \"id\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/auth/metamask"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "from": "tempora",
    "signature": "id"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-metamask">
</span>
<span id="execution-results-POSTapi-auth-metamask" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-metamask"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-metamask"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-metamask" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-metamask">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-metamask" data-method="POST"
      data-path="api/auth/metamask"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-metamask', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-metamask"
                    onclick="tryItOut('POSTapi-auth-metamask');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-metamask"
                    onclick="cancelTryOut('POSTapi-auth-metamask');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-metamask"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/metamask</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-metamask"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-metamask"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>from</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from"                data-endpoint="POSTapi-auth-metamask"
               value="tempora"
               data-component="body">
    <br>
<p>Example: <code>tempora</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>signature</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="signature"                data-endpoint="POSTapi-auth-metamask"
               value="id"
               data-component="body">
    <br>
<p>Example: <code>id</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-user-inventory">GET api/user/inventory</h2>

<p>
</p>



<span id="example-requests-GETapi-user-inventory">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/api/user/inventory" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/user/inventory"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user-inventory">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 8
access-control-allow-origin: *
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE
access-control-allow-headers: Content-Type, Authorization
access-control-allow-credentials: true
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthorized&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user-inventory" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user-inventory"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user-inventory"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-user-inventory" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user-inventory">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-user-inventory" data-method="GET"
      data-path="api/user/inventory"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user-inventory', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user-inventory"
                    onclick="tryItOut('GETapi-user-inventory');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user-inventory"
                    onclick="cancelTryOut('GETapi-user-inventory');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user-inventory"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user/inventory</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-user-inventory"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-user-inventory"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-OPTIONSapi--any-">OPTIONS api/{any}</h2>

<p>
</p>



<span id="example-requests-OPTIONSapi--any-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request OPTIONS \
    "http://127.0.0.1:8000/api/api/A^" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/api/A^"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "OPTIONS",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-OPTIONSapi--any-">
</span>
<span id="execution-results-OPTIONSapi--any-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-OPTIONSapi--any-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-OPTIONSapi--any-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-OPTIONSapi--any-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-OPTIONSapi--any-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-OPTIONSapi--any-" data-method="OPTIONS"
      data-path="api/{any}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('OPTIONSapi--any-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-OPTIONSapi--any-"
                    onclick="tryItOut('OPTIONSapi--any-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-OPTIONSapi--any-"
                    onclick="cancelTryOut('OPTIONSapi--any-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-OPTIONSapi--any-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-grey">OPTIONS</small>
            <b><code>api/{any}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="OPTIONSapi--any-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="OPTIONSapi--any-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>any</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="any"                data-endpoint="OPTIONSapi--any-"
               value="A^"
               data-component="url">
    <br>
<p>Example: <code>A^</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
