# JS :: Frameworks :: NextJS :: Ref :: Configuration

https://nextjs.org/docs/app/building-your-application/configuring

Configuration
- TypeScript
  - New Projects
  - Existing Projects
  - TypeScript Plugin
    - Plugin Features
  - Minimum TypeScript Version
  - Statically Typed Links
  - End-to-End Type Safety
  - Async Server Component TypeScript Error
  - Passing Data Between Server & Client Components
  - Path aliases and baseUrl
  - Type checking next.config.js
  - Incremental type checking
  - Ignoring TypeScript Errors
  - Version Changes
- ESLint
  - ESLint Config
  - ESLint Plugin
    - Custom Settings
      - rootDir
  - Linting Custom Directories and Files
  - Caching
  - Disabling Rules
    - Core Web Vitals
  - Usage With Other Tools
    - Prettier
    - lint-staged
  - Migrating Existing Config
    - Recommended Plugin Ruleset
    - Additional Configurations
- Environment Variables
  - Loading Environment Variables
    - Referencing Other Variables
  - Bundling Environment Variables for the Browser
  - Default Environment Variables
  - Environment Variables on Vercel
  - Test Environment Variables
  - Environment Variable Load Order
  - Good to know
- Absolute Imports and Module Path Aliases
  - Absolute Imports
  - Module Aliases
  https://github.com/vercel/next.js/tree/canary/examples/with-absolute-imports
- MDX
  - @next/mdx
  - Getting Started
  - Remote MDX
  - Layouts
  - Remark and Rehype Plugins
  - Frontmatter
  - Custom Elements
  - Deep Dive: How do you transform markdown into HTML?
  - Using the Rust-based MDX compiler (Experimental)
  - Helpful Links
- src Directory
- Draft Mode
  - Step 1: Create and access the Route Handler
    - Securely accessing it from your Headless CMS
  - Step 2: Update page
    - More Details
    - Clear the Draft Mode cookie
    - Unique per next build



Next.js allows you to customize your project to meet specific requirements. This includes integrations with TypeScript, ESlint, and more, as well as internal configuration options such as Absolute Imports and Environment Variables.

- TypeScript
  Next.js provides a TypeScript-first development experience for building your React application.
- ESLint
  Next.js provides an integrated ESLint experience by default. These conformance rules help you use Next.js in an optimal way.
- Environment Variables
  Learn to add and access environment variables in your Next.js application.
- Absolute Imports and Module Path Aliases
  Configure module path aliases that allow you to remap certain import paths.
- MDX
  Learn how to configure MDX to write JSX in your markdown files.
- src Directory
  Save pages under the `src` directory as an alternative to the root `pages` directory.
- Draft Mode
  Next.js has draft mode to toggle between static and dynamic pages. You can learn how it works with App
