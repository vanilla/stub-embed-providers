<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
        }

        header {
            padding: 24px;
        }

        footer {
            padding: 24px;
        }

        code {
            background: #111;
            color: white;
            padding: 9px 12px;
        }
    </style>
</head>

<body>
    <header class="header">
        <h1>Modern Embed Header with SSO</h1>
        <p>If the embedded frame does not load properly be sure to set the configuration setting

        <pre><code>$Configuration['Garden']['Embed']['Allow'] = 3;</code></pre>
        </p>
        <p>
            Ensure that you have set up the stub SSO providers and configured your local instance of Vanilla to connect via sso.

            Update this file with your user credentials to automatically generate an SSO string.
        </p>
        <?php
        $user = [
            // The SSO provider ID you configured
            'client_id' => 'stub_jsconnect',
            // Your users information (in the user table in the vanilla_sso db)
            'uniqueid' => 1,
            'name' => 'Maneesh',
            'email' => 'mchiba@higherlogic.com',
            'photourl' => null,
            'roles' => null,
        ];

        // The SSO provider secret you configured
        $secret = "1234";

        $string = base64_encode(json_encode($user));
        $timestamp = time();
        $hash = hash_hmac('sha1', "$string $timestamp", $secret);
        $sso_string = "{$string} {$hash} {$timestamp} hmacsha1";
        ?>

        <code style="line-height: 1.5em; max-width:70vw; display:block; word-break:break-all;">
            GENERATED SSO STRING <br />
            ==================== <br /><br />
            <?php echo $sso_string; ?>
        </code>
    </header>
    <!-- Vanilla's Embed Javascript. Make sure you replace the domain with your own!!! -->
    <script defer src="https://dev.vanilla.localhost/api/v2/assets/embed-script"></script>
    <!--
        PARAMETER DOCUMENTATION

        `remote-url` - This should be the base url of the site you are embedding. REQUIRED
        `initial-path` - The initial path the embed should start on if there isn't one in the URL already.
        `position` - This has two possible values
            - `sticky` - The community content will stick to the top of the page when scrolling, pushing the header out of the viewport. DEFAULT
            - `static` - Users will have to scroll outside of the community to scroll the header off of the page.
        `sso-string` - Pass a community members unique string to provide them access through SSO or define it on as `vanilla_sso` in the window object of the page

        NOTES
        - The `height: 100vh` is recommended for the best user experience.
     -->

    <vanilla-embed remote-url="https://dev.vanilla.localhost" style="height: 100vh" position="sticky" sso-string="<?php echo $sso_string; ?>">
        <noscript>Enable Javascript to view this Community.</noscript>
    </vanilla-embed>
    <footer>Hello external footer</footer>
</body>

</html>