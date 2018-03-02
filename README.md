# stub-sso-providers

**Fair warning that nothing in this repository is considered SECURE nor STABLE enough for production use.**

This repository aims at providing preconfigured embed providers for testing purposes. They aren't pretty, and they aren't complete.

## Setup

*Our [Vanilla Docker](https://github.com/vanilla/vanilla-docker/) project is pre-configured to work with this repository.*

You will need a functioning Vanilla Docker setup with your main site exposed at `dev.vanilla.localhost`. The embedded versions of the site will then be available at

- `embed.vanilla.localhost`
- `advanced-embed.vanilla.localhost`

Additionally for the normal embed you will need to set the config setting `Garden.Embed.Allow` to `true`. For the Advanced embed you will need to set `Garden.Embed.Allow` to `2`.
