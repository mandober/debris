## System Info

2021-07-17

* Code: 1.58.2 (c3f126316369cd610563c75b1b1725e0679adfb3)
* OS: win32(10.0.19043)
* CPUs: Intel(R) Core(TM) i5-2500K CPU @ 3.30GHz(4 x 3311)
* Memory(System): 7.46 GB(3.99GB free)
* Memory(Process): 186.26 MB working set(155.21MB private, 2.88MB shared)
* VM(likelihood): 0%
* Initial Startup: true
* Has 0 other windows
* Screen Reader Active: false
* Empty Workspace: false

## Performance Marks

| What                                                            | Duration | Process                   | Info                                                        |
| --------------------------------------------------------------- | -------- | ------------------------- | ----------------------------------------------------------- |
| start => app.isReady                                            | 128      | [main]                    | initial startup: true                                       |
| nls:start => nls:end                                            | 0        | [main]                    | initial startup: true                                       |
| require(main.bundle.js)                                         | 83       | [main]                    | initial startup: true                                       |
| start crash reporter                                            | 51       | [main]                    | initial startup: true                                       |
| serve main IPC handle                                           | 4        | [main]                    | initial startup: true                                       |
| create window                                                   | 34       | [main]                    | initial startup: true, state: 0ms, widget: 20ms, show: 12ms |
| app.isReady => window.loadUrl()                                 | 199      | [main]                    | initial startup: true                                       |
| window.loadUrl() => begin to require(workbench.desktop.main.js) | 405      | [main->renderer]          | NewWindow                                                   |
| require(workbench.desktop.main.js)                              | 524      | [renderer]                | cached data: YES, node_modules took 0ms                     |
| wait for window config                                          | 0        | [renderer]                | -                                                           |
| init storage (global & workspace)                               | 20       | [renderer]                | -                                                           |
| init workspace service                                          | 103      | [renderer]                | -                                                           |
| register extensions & spawn extension host                      | 1344     | [renderer]                | -                                                           |
| restore viewlet                                                 | 13       | [renderer]                | workbench.view.explorer                                     |
| restore panel                                                   | 0        | [renderer]                | -                                                           |
| restore & resolve visible editors                               | 507      | [renderer]                | 1: workbench.editors.files.fileEditorInput                  |
| overall workbench load                                          | 857      | [renderer]                | -                                                           |
| workbench ready                                                 | 2226     | [main->renderer]          | -                                                           |
| renderer ready                                                  | 1502     | [renderer]                | -                                                           |
| shared process connection ready                                 | 454      | [renderer->sharedprocess] | -                                                           |
| extensions registered                                           | 3200     | [renderer]                | -                                                           |

## Extension Activation Stats

| Extension                                        | Eager | Load Code | Call Activate | Finish Activate | Event                                                 | By                                               |
| ------------------------------------------------ | ----- | --------- | ------------- | --------------- | ----------------------------------------------------- | ------------------------------------------------ |
| vscode.configuration-editing                     | false | 6         | 1             | 38              | onLanguage:jsonc                                      | vscode.configuration-editing                     |
| vscode.debug-auto-launch                         | false | 4         | 0             | 16              | *                                                     | vscode.debug-auto-launch                         |
| vscode.emmet                                     | false | 8         | 4             | 5               | onStartupFinished                                     | vscode.emmet                                     |
| vscode.extension-editing                         | false | 6         | 1             | 5               | onLanguage:markdown                                   | vscode.extension-editing                         |
| vscode.git                                       | false | 24        | 4             | 1095            | *                                                     | vscode.github                                    |
| vscode.github                                    | false | 5         | 1             | 0               | *                                                     | vscode.github                                    |
| vscode.github-authentication                     | false | 10        | 0             | 6               | onAuthenticationRequest:github                        | vscode.github-authentication                     |
| vscode.json-language-features                    | false | 18        | 4             | 34              | onLanguage:jsonc                                      | vscode.json-language-features                    |
| vscode.markdown-language-features                | false | 16        | 2             | 3               | onLanguage:markdown                                   | vscode.markdown-language-features                |
| vscode.merge-conflict                            | false | 5         | 1             | 4               | onStartupFinished                                     | vscode.merge-conflict                            |
| vscode.microsoft-authentication                  | false | 10        | 2             | 117             | onAuthenticationRequest:microsoft                     | vscode.microsoft-authentication                  |
| ms-vscode-remote.remote-wsl-recommender          | false | 8         | 1             | 3               | onStartupFinished                                     | ms-vscode-remote.remote-wsl-recommender          |
| ms-vscode.js-debug                               | false | 132       | 11            | 16              | onCommand:extension.js-debug.clearAutoAttachVariables | ms-vscode.js-debug                               |
| vscode.npm                                       | false | 20        | 0             | 447             | onLanguage:json                                       | vscode.npm                                       |
| vscode.simple-browser                            | false | 17        | 0             | 0               | onOpenExternalUri:https                               | vscode.simple-browser                            |
| vscode.testing-editor-contributions              | false | 1         | 0             | 3               | onStartupFinished                                     | vscode.testing-editor-contributions              |
| vscode.typescript-language-features              | false | 16        | 5             | 30              | onLanguage:jsonc                                      | vscode.typescript-language-features              |
| AlanWalk.markdown-toc                            | false | 3         | 0             | 3               | onLanguage:markdown                                   | AlanWalk.markdown-toc                            |
| brunnerh.insert-unicode                          | false | 182       | 1             | 29              | onView:insert-unicode.identifyView                    | brunnerh.insert-unicode                          |
| d-koppenhagen.file-tree-to-text-generator        | false | 4         | 0             | 12              | *                                                     | d-koppenhagen.file-tree-to-text-generator        |
| fcrespo82.markdown-table-formatter               | false | 20        | 1             | 2               | onStartupFinished                                     | fcrespo82.markdown-table-formatter               |
| GlenBuktenica.unicode-substitutions              | false | 16        | 0             | 12              | *                                                     | GlenBuktenica.unicode-substitutions              |
| mathiassoeholm.markdown-link-updater             | false | 120       | 0             | 2               | onStartupFinished                                     | mathiassoeholm.markdown-link-updater             |
| ms-vscode-remote.remote-containers               | false | 40        | 0             | 494             | onStartupFinished                                     | ms-vscode-remote.remote-containers               |
| ms-vscode-remote.remote-wsl                      | false | 7         | 2             | 0               | onStartupFinished                                     | ms-vscode-remote.remote-wsl                      |
| RedVanWorkshop.explorer-exclude-vscode-extension | false | 24        | 2             | 10              | *                                                     | RedVanWorkshop.explorer-exclude-vscode-extension |
| russoturisto.markdown-dir                        | false | 3         | 0             | 3               | onLanguage:markdown                                   | russoturisto.markdown-dir                        |
| shd101wyy.markdown-preview-enhanced              | false | 994       | 2             | 1               | onLanguage:markdown                                   | shd101wyy.markdown-preview-enhanced              |
| streetsidesoftware.code-spell-checker            | false | 17        | 0             | 76              | *                                                     | streetsidesoftware.code-spell-checker            |
| tchayen.markdown-links                           | false | 6         | 0             | 1               | onLanguage:markdown                                   | tchayen.markdown-links                           |
| vscode-icons-team.vscode-icons                   | false | 22        | 4             | 1882            | *                                                     | vscode-icons-team.vscode-icons                   |
| wwm.better-align                                 | false | 10        | 0             | 1               | onCommand:wwm.aligncode                               | wwm.better-align                                 |

## Raw Perf Marks: main

```
Name	Timestamp	Delta	Total
code/timeOrigin	1626465770920	0	0
code/didStartMain	1626465771022	102	102
code/willStartCrashReporter	1626465771043	21	123
code/didStartCrashReporter	1626465771094	51	174
code/mainAppReady	1626465771150	56	230
code/willLoadMainBundle	1626465771155	5	235
code/fork/willLoadCode	1626465771175	20	255
code/registerFilesystem/file	1626465771235	60	315
code/didLoadMainBundle	1626465771238	3	318
code/willStartMainServer	1626465771261	23	341
code/didStartMainServer	1626465771265	4	345
code/willCreateCodeWindow	1626465771311	46	391
code/willRestoreCodeWindowState	1626465771311	0	391
code/didRestoreCodeWindowState	1626465771311	0	391
code/willCreateCodeBrowserWindow	1626465771313	2	393
code/didCreateCodeBrowserWindow	1626465771333	20	413
code/willMaximizeCodeWindow	1626465771333	0	413
code/didMaximizeCodeWindow	1626465771345	12	425
code/didCreateCodeWindow	1626465771345	0	425
code/willOpenNewWindow	1626465771349	4	429
```
## Raw Perf Marks: renderer

```
Name	Timestamp	Delta	Total
code/timeOrigin	1626465771350	0	0
code/didStartRenderer	1626465771746	396	396
code/willWaitForWindowConfig	1626465771747	1	397
code/didWaitForWindowConfig	1626465771747	0	397
code/willShowPartsSplash	1626465771747	0	397
code/didShowPartsSplash	1626465771747	0	397
code/willLoadWorkbenchMain	1626465771754	7	404
code/didLoadWorkbenchMain	1626465772278	524	928
code/registerFilesystem/file	1626465772279	1	929
code/registerFilesystem/vscode-userdata	1626465772279	0	929
code/willInitWorkspaceService	1626465772282	3	932
code/willInitStorage	1626465772283	1	933
code/didInitStorage	1626465772303	20	953
code/didInitWorkspaceService	1626465772385	82	1035
code/willStartWorkbench	1626465772391	6	1041
code/LifecyclePhase/Ready	1626465772393	2	1043
code/registerFilesystem/trustedDomains	1626465772502	109	1152
code/willRestoreEditors	1626465772741	239	1391
code/willRestoreViewlet	1626465772751	10	1401
code/didRestoreViewlet	1626465772764	13	1414
code/willResolveExplorer	1626465772809	45	1459
code/willLoadExtensions	1626465772878	69	1528
code/didResolveExplorer	1626465773069	191	1719
code/didRestoreEditors	1626465773248	179	1898
code/LifecyclePhase/Restored	1626465773248	0	1898
code/didStartWorkbench	1626465773248	0	1898
code/didRemovePartsSplash	1626465773248	0	1898
code/willConnectSharedProcess	1626465773286	38	1936
code/didConnectSharedProcess	1626465773740	454	2390
code/willHandleExtensionPoints	1626465773787	47	2437
code/didHandleExtensionPoints	1626465774199	412	2849
code/didLoadExtensions	1626465774222	23	2872
```
## Raw Perf Marks: localExtHost

```
Name	Timestamp	Delta	Total
code/timeOrigin	1626465772935	0	0
code/fork/start	1626465773033	98	98
code/fork/willLoadCode	1626465773059	26	124
code/extHost/willConnectToRenderer	1626465773413	354	478
code/extHost/didConnectToRenderer	1626465773416	3	481
code/extHost/didWaitForInitData	1626465774299	883	1364
code/extHost/didCreateServices	1626465774310	11	1375
code/extHost/willWaitForConfig	1626465774314	4	1379
code/extHost/didWaitForConfig	1626465774554	240	1619
code/extHost/didInitAPI	1626465774554	0	1619
code/extHost/didInitProxyResolver	1626465774562	8	1627
code/extHost/ready	1626465774562	0	1627
code/extHost/willLoadExtensionCode/vscode.microsoft-authentication	1626465774633	71	1698
code/extHost/didLoadExtensionCode/vscode.microsoft-authentication	1626465774646	13	1711
code/extHost/willLoadExtensionCode/vscode.configuration-editing	1626465774647	1	1712
code/extHost/didLoadExtensionCode/vscode.configuration-editing	1626465774653	6	1718
code/extHost/willLoadExtensionCode/vscode.json-language-features	1626465774653	0	1718
code/extHost/didLoadExtensionCode/vscode.json-language-features	1626465774673	20	1738
code/extHost/willLoadExtensionCode/vscode.typescript-language-features	1626465774674	1	1739
code/extHost/didLoadExtensionCode/vscode.typescript-language-features	1626465774690	16	1755
code/extHost/willLoadExtensionCode/brunnerh.insert-unicode	1626465774691	1	1756
code/extHost/didLoadExtensionCode/brunnerh.insert-unicode	1626465775091	400	2156
code/extHost/willLoadExtensionCode/vscode.debug-auto-launch	1626465775092	1	2157
code/extHost/didLoadExtensionCode/vscode.debug-auto-launch	1626465775099	7	2164
code/extHost/willLoadExtensionCode/vscode.git	1626465775099	0	2164
code/extHost/didLoadExtensionCode/vscode.git	1626465775163	64	2228
code/extHost/willLoadExtensionCode/d-koppenhagen.file-tree-to-text-generator	1626465775163	0	2228
code/extHost/didLoadExtensionCode/d-koppenhagen.file-tree-to-text-generator	1626465775199	36	2264
code/extHost/willLoadExtensionCode/GlenBuktenica.unicode-substitutions	1626465775200	1	2265
code/extHost/didLoadExtensionCode/GlenBuktenica.unicode-substitutions	1626465775209	9	2274
code/extHost/willLoadExtensionCode/RedVanWorkshop.explorer-exclude-vscode-extension	1626465775209	0	2274
code/extHost/didLoadExtensionCode/RedVanWorkshop.explorer-exclude-vscode-extension	1626465775250	41	2315
code/extHost/willLoadExtensionCode/streetsidesoftware.code-spell-checker	1626465775250	0	2315
code/extHost/didLoadExtensionCode/streetsidesoftware.code-spell-checker	1626465775273	23	2338
code/extHost/willLoadExtensionCode/vscode-icons-team.vscode-icons	1626465775273	0	2338
code/extHost/didLoadExtensionCode/vscode-icons-team.vscode-icons	1626465775301	28	2366
code/extHost/willActivateExtension/vscode.microsoft-authentication	1626465775382	81	2447
code/extHost/willActivateExtension/vscode.configuration-editing	1626465775384	2	2449
code/extHost/willActivateExtension/vscode.json-language-features	1626465775385	1	2450
code/extHost/willActivateExtension/vscode.typescript-language-features	1626465775390	5	2455
code/extHost/willActivateExtension/brunnerh.insert-unicode	1626465775395	5	2460
code/extHost/willActivateExtension/vscode.debug-auto-launch	1626465775396	1	2461
code/extHost/willActivateExtension/vscode.git	1626465775396	0	2461
code/extHost/willActivateExtension/d-koppenhagen.file-tree-to-text-generator	1626465775400	4	2465
code/extHost/willActivateExtension/GlenBuktenica.unicode-substitutions	1626465775400	0	2465
code/extHost/willActivateExtension/RedVanWorkshop.explorer-exclude-vscode-extension	1626465775400	0	2465
code/extHost/willActivateExtension/streetsidesoftware.code-spell-checker	1626465775403	3	2468
code/extHost/willActivateExtension/vscode-icons-team.vscode-icons	1626465775403	0	2468
code/extHost/didActivateExtension/vscode.configuration-editing	1626465775409	6	2474
code/extHost/didActivateExtension/vscode.json-language-features	1626465775409	0	2474
code/extHost/didActivateExtension/vscode.typescript-language-features	1626465775409	0	2474
code/extHost/didActivateExtension/brunnerh.insert-unicode	1626465775409	0	2474
code/extHost/didActivateExtension/vscode.debug-auto-launch	1626465775409	0	2474
code/extHost/didActivateExtension/d-koppenhagen.file-tree-to-text-generator	1626465775409	0	2474
code/extHost/didActivateExtension/GlenBuktenica.unicode-substitutions	1626465775409	0	2474
code/extHost/didActivateExtension/RedVanWorkshop.explorer-exclude-vscode-extension	1626465775409	0	2474
code/extHost/didActivateExtension/streetsidesoftware.code-spell-checker	1626465775539	130	2604
code/extHost/didActivateExtension/vscode.microsoft-authentication	1626465775568	29	2633
code/extHost/willLoadExtensionCode/ms-vscode.js-debug	1626465775917	349	2982
code/extHost/didLoadExtensionCode/ms-vscode.js-debug	1626465776056	139	3121
code/extHost/willActivateExtension/ms-vscode.js-debug	1626465776074	18	3139
code/extHost/didActivateExtension/ms-vscode.js-debug	1626465776088	14	3153
code/extHost/willLoadExtensionCode/vscode.github-authentication	1626465776096	8	3161
code/extHost/didLoadExtensionCode/vscode.github-authentication	1626465776121	25	3186
code/extHost/willActivateExtension/vscode.github-authentication	1626465776348	227	3413
code/extHost/didActivateExtension/vscode.github-authentication	1626465776348	0	3413
code/extHost/didActivateExtension/vscode.git	1626465776656	308	3721
code/extHost/willLoadExtensionCode/vscode.extension-editing	1626465776909	253	3974
code/extHost/didLoadExtensionCode/vscode.extension-editing	1626465776918	9	3983
code/extHost/willLoadExtensionCode/vscode.markdown-language-features	1626465776918	0	3983
code/extHost/didLoadExtensionCode/vscode.markdown-language-features	1626465776946	28	4011
code/extHost/willLoadExtensionCode/AlanWalk.markdown-toc	1626465776946	0	4011
code/extHost/didLoadExtensionCode/AlanWalk.markdown-toc	1626465776951	5	4016
code/extHost/willLoadExtensionCode/russoturisto.markdown-dir	1626465776951	0	4016
code/extHost/didLoadExtensionCode/russoturisto.markdown-dir	1626465776958	7	4023
code/extHost/willLoadExtensionCode/shd101wyy.markdown-preview-enhanced	1626465776958	0	4023
code/extHost/didLoadExtensionCode/shd101wyy.markdown-preview-enhanced	1626465778237	1279	5302
code/extHost/willLoadExtensionCode/tchayen.markdown-links	1626465778237	0	5302
code/extHost/didLoadExtensionCode/tchayen.markdown-links	1626465778246	9	5311
code/extHost/willActivateExtension/vscode.extension-editing	1626465778258	12	5323
code/extHost/willActivateExtension/vscode.markdown-language-features	1626465778259	1	5324
code/extHost/willActivateExtension/AlanWalk.markdown-toc	1626465778262	3	5327
code/extHost/willActivateExtension/russoturisto.markdown-dir	1626465778263	1	5328
code/extHost/willActivateExtension/shd101wyy.markdown-preview-enhanced	1626465778263	0	5328
code/extHost/willActivateExtension/tchayen.markdown-links	1626465778265	2	5330
code/extHost/didActivateExtension/vscode.extension-editing	1626465778265	0	5330
code/extHost/didActivateExtension/vscode.markdown-language-features	1626465778265	0	5330
code/extHost/didActivateExtension/AlanWalk.markdown-toc	1626465778265	0	5330
code/extHost/didActivateExtension/russoturisto.markdown-dir	1626465778265	0	5330
code/extHost/didActivateExtension/shd101wyy.markdown-preview-enhanced	1626465778265	0	5330
code/extHost/didActivateExtension/tchayen.markdown-links	1626465778265	0	5330
code/extHost/didActivateExtension/vscode-icons-team.vscode-icons	1626465778885	620	5950
code/extHost/willLoadExtensionCode/vscode.github	1626465778887	2	5952
code/extHost/didLoadExtensionCode/vscode.github	1626465778893	6	5958
code/extHost/willActivateExtension/vscode.github	1626465778893	0	5958
code/extHost/didActivateExtension/vscode.github	1626465778894	1	5959
```
## Raw Perf Marks: localExtHost

```
Name	Timestamp	Delta	Total
code/timeOrigin	1626466347655	0	0
code/fork/start	1626466347742	87	87
code/fork/willLoadCode	1626466347766	24	111
code/extHost/willConnectToRenderer	1626466348031	265	376
code/extHost/didConnectToRenderer	1626466348033	2	378
code/extHost/didWaitForInitData	1626466348061	28	406
code/extHost/didCreateServices	1626466348070	9	415
code/extHost/willWaitForConfig	1626466348074	4	419
code/extHost/didWaitForConfig	1626466348141	67	486
code/extHost/didInitAPI	1626466348141	0	486
code/extHost/didInitProxyResolver	1626466348146	5	491
code/extHost/ready	1626466348146	0	491
code/extHost/willLoadExtensionCode/vscode.configuration-editing	1626466348156	10	501
code/extHost/didLoadExtensionCode/vscode.configuration-editing	1626466348162	6	507
code/extHost/willLoadExtensionCode/vscode.json-language-features	1626466348163	1	508
code/extHost/didLoadExtensionCode/vscode.json-language-features	1626466348181	18	526
code/extHost/willLoadExtensionCode/vscode.typescript-language-features	1626466348182	1	527
code/extHost/didLoadExtensionCode/vscode.typescript-language-features	1626466348198	16	543
code/extHost/willLoadExtensionCode/brunnerh.insert-unicode	1626466348198	0	543
code/extHost/didLoadExtensionCode/brunnerh.insert-unicode	1626466348380	182	725
code/extHost/willLoadExtensionCode/vscode.microsoft-authentication	1626466348380	0	725
code/extHost/didLoadExtensionCode/vscode.microsoft-authentication	1626466348390	10	735
code/extHost/willLoadExtensionCode/ms-vscode.js-debug	1626466348390	0	735
code/extHost/didLoadExtensionCode/ms-vscode.js-debug	1626466348522	132	867
code/extHost/willLoadExtensionCode/vscode.debug-auto-launch	1626466348522	0	867
code/extHost/didLoadExtensionCode/vscode.debug-auto-launch	1626466348526	4	871
code/extHost/willLoadExtensionCode/vscode.git	1626466348527	1	872
code/extHost/didLoadExtensionCode/vscode.git	1626466348551	24	896
code/extHost/willLoadExtensionCode/d-koppenhagen.file-tree-to-text-generator	1626466348551	0	896
code/extHost/didLoadExtensionCode/d-koppenhagen.file-tree-to-text-generator	1626466348555	4	900
code/extHost/willLoadExtensionCode/GlenBuktenica.unicode-substitutions	1626466348556	1	901
code/extHost/didLoadExtensionCode/GlenBuktenica.unicode-substitutions	1626466348571	15	916
code/extHost/willLoadExtensionCode/RedVanWorkshop.explorer-exclude-vscode-extension	1626466348572	1	917
code/extHost/didLoadExtensionCode/RedVanWorkshop.explorer-exclude-vscode-extension	1626466348596	24	941
code/extHost/willLoadExtensionCode/streetsidesoftware.code-spell-checker	1626466348596	0	941
code/extHost/didLoadExtensionCode/streetsidesoftware.code-spell-checker	1626466348613	17	958
code/extHost/willLoadExtensionCode/vscode-icons-team.vscode-icons	1626466348613	0	958
code/extHost/didLoadExtensionCode/vscode-icons-team.vscode-icons	1626466348635	22	980
code/extHost/willLoadExtensionCode/vscode.github-authentication	1626466348636	1	981
code/extHost/didLoadExtensionCode/vscode.github-authentication	1626466348646	10	991
code/extHost/willLoadExtensionCode/vscode.extension-editing	1626466348647	1	992
code/extHost/didLoadExtensionCode/vscode.extension-editing	1626466348653	6	998
code/extHost/willLoadExtensionCode/vscode.markdown-language-features	1626466348654	1	999
code/extHost/didLoadExtensionCode/vscode.markdown-language-features	1626466348670	16	1015
code/extHost/willLoadExtensionCode/AlanWalk.markdown-toc	1626466348670	0	1015
code/extHost/didLoadExtensionCode/AlanWalk.markdown-toc	1626466348673	3	1018
code/extHost/willLoadExtensionCode/russoturisto.markdown-dir	1626466348673	0	1018
code/extHost/didLoadExtensionCode/russoturisto.markdown-dir	1626466348675	2	1020
code/extHost/willLoadExtensionCode/shd101wyy.markdown-preview-enhanced	1626466348676	1	1021
code/extHost/didLoadExtensionCode/shd101wyy.markdown-preview-enhanced	1626466349670	994	2015
code/extHost/willLoadExtensionCode/tchayen.markdown-links	1626466349670	0	2015
code/extHost/didLoadExtensionCode/tchayen.markdown-links	1626466349676	6	2021
code/extHost/willLoadExtensionCode/wwm.better-align	1626466349676	0	2021
code/extHost/didLoadExtensionCode/wwm.better-align	1626466349686	10	2031
code/extHost/willActivateExtension/vscode.configuration-editing	1626466349693	7	2038
code/extHost/willActivateExtension/vscode.json-language-features	1626466349694	1	2039
code/extHost/willActivateExtension/vscode.typescript-language-features	1626466349698	4	2043
code/extHost/willActivateExtension/brunnerh.insert-unicode	1626466349703	5	2048
code/extHost/willActivateExtension/vscode.microsoft-authentication	1626466349704	1	2049
code/extHost/willActivateExtension/ms-vscode.js-debug	1626466349706	2	2051
code/extHost/willActivateExtension/vscode.debug-auto-launch	1626466349717	11	2062
code/extHost/willActivateExtension/vscode.git	1626466349717	0	2062
code/extHost/willActivateExtension/d-koppenhagen.file-tree-to-text-generator	1626466349721	4	2066
code/extHost/willActivateExtension/GlenBuktenica.unicode-substitutions	1626466349721	0	2066
code/extHost/willActivateExtension/RedVanWorkshop.explorer-exclude-vscode-extension	1626466349721	0	2066
code/extHost/willActivateExtension/streetsidesoftware.code-spell-checker	1626466349723	2	2068
code/extHost/willActivateExtension/vscode-icons-team.vscode-icons	1626466349723	0	2068
code/extHost/willActivateExtension/vscode.github-authentication	1626466349727	4	2072
code/extHost/willActivateExtension/vscode.extension-editing	1626466349727	0	2072
code/extHost/willActivateExtension/vscode.markdown-language-features	1626466349728	1	2073
code/extHost/willActivateExtension/AlanWalk.markdown-toc	1626466349730	2	2075
code/extHost/willActivateExtension/russoturisto.markdown-dir	1626466349730	0	2075
code/extHost/willActivateExtension/shd101wyy.markdown-preview-enhanced	1626466349730	0	2075
code/extHost/willActivateExtension/tchayen.markdown-links	1626466349732	2	2077
code/extHost/willActivateExtension/wwm.better-align	1626466349732	0	2077
code/extHost/didActivateExtension/vscode.configuration-editing	1626466349733	1	2078
code/extHost/didActivateExtension/vscode.json-language-features	1626466349733	0	2078
code/extHost/didActivateExtension/vscode.typescript-language-features	1626466349733	0	2078
code/extHost/didActivateExtension/brunnerh.insert-unicode	1626466349733	0	2078
code/extHost/didActivateExtension/ms-vscode.js-debug	1626466349733	0	2078
code/extHost/didActivateExtension/vscode.debug-auto-launch	1626466349733	0	2078
code/extHost/didActivateExtension/d-koppenhagen.file-tree-to-text-generator	1626466349733	0	2078
code/extHost/didActivateExtension/GlenBuktenica.unicode-substitutions	1626466349733	0	2078
code/extHost/didActivateExtension/RedVanWorkshop.explorer-exclude-vscode-extension	1626466349733	0	2078
code/extHost/didActivateExtension/vscode.extension-editing	1626466349733	0	2078
code/extHost/didActivateExtension/vscode.markdown-language-features	1626466349733	0	2078
code/extHost/didActivateExtension/AlanWalk.markdown-toc	1626466349733	0	2078
code/extHost/didActivateExtension/russoturisto.markdown-dir	1626466349733	0	2078
code/extHost/didActivateExtension/shd101wyy.markdown-preview-enhanced	1626466349733	0	2078
code/extHost/didActivateExtension/tchayen.markdown-links	1626466349733	0	2078
code/extHost/didActivateExtension/wwm.better-align	1626466349733	0	2078
code/extHost/didActivateExtension/vscode.github-authentication	1626466349734	1	2079
code/extHost/didActivateExtension/streetsidesoftware.code-spell-checker	1626466349803	69	2148
code/extHost/didActivateExtension/vscode.microsoft-authentication	1626466349823	20	2168
code/extHost/didActivateExtension/vscode.git	1626466350816	993	3161
code/extHost/didActivateExtension/vscode-icons-team.vscode-icons	1626466351609	793	3954
code/extHost/willLoadExtensionCode/vscode.github	1626466351611	2	3956
code/extHost/didLoadExtensionCode/vscode.github	1626466351616	5	3961
code/extHost/willActivateExtension/vscode.github	1626466351617	1	3962
code/extHost/didActivateExtension/vscode.github	1626466351618	1	3963
```

## Node Cached Data Stats


### cached data used


### cached data missed


### cached data rejected


### cached data created (lazy, might need refreshes)
