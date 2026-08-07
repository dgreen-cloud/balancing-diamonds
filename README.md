# balancing-diamonds

Website of Balancing Diamonds.

## Publishing

This repository is configured to publish to GitHub Pages from the `main` branch using:

- `.github/workflows/deploy-pages.yml`
- `CNAME` set to `balancingdiamonds.com`

### One-time GitHub settings

1. Open repository **Settings → Pages**
2. Set **Source** to **GitHub Actions**
3. Ensure your domain DNS points to GitHub Pages:
   - Apex `balancingdiamonds.com` A records to GitHub Pages IPs
   - `www` CNAME to `dgreen-cloud.github.io`
