# Scripts

![Number of scripts](https://img.shields.io/badge/Scripts-63-brightgreen.svg)
![License](https://img.shields.io/badge/License-Public%20Domain-blue.svg)

This repository contains all scripts I personally use as commands with my [Scripts-Plugin](https://github.com/nkreer/Fish-Scripts) for the Fish IRC-Bot and another private project, but they can be used like any other PHP script on the command line.

## List of Scripts

### Fun

| Script | Description | Fish-Usage |
|--------|-------------|------------|
| coffee.php | Makes the bot give coffee | `coffee [username]` |
| gif.php | Gif searches via Giphy | `gif <query>` |
| image.php | Get a viral image from imgur | `image` |
| joke.php | Chuck Norris jokes via icndb.com | `joke` |
| ping.php | Simply replies with "Pong". | `ping` |
| postillon.php | Get a random Der Postillon newsticker | `postillon` |
| qod.php | Get the Quote Of The Day from They Said So | `qod [category]` |
| rps.php | Rock Paper Scissors | `rps <r/p/s>` |
| russianroulette.php | Russian Roulette | `russianroulette` |
| slap.php | Slap a user with something random | `slap [username]` |
| swag.php | Makes a text go rainbow | `swag <text>` |
| trivia.php | Get a random jeopardy question and answer | `trivia` |
| trump.php | Get a random Donald Trump quote | `trump` |

### Information

| Script | Description | Fish-Usage |
|--------|-------------|------------|
| catfact.php | Random cat fact from catfacts-api.appspot.com | `catfact` |
| chefkoch.php | Search Chefkoch.de | `chefkoch <query>`|
| cve.php | Get info on a CVE | `cve <CVE-ID>` |
| define.php | Get urban dictionary definitions | `define <query>` |
| fact.php | Random fact from numbersapi.com | `fact [number]` |
| github.php | Search GitHub repositories | `github <query>` |
| haveibeenpwned.php | Check haveibeenpwned.com | `haveibeenpwned <username/email>` |
| kfz.php | Search german Kennzeichen | `kfz <query>` |
| language.php | Search languages and their ISO 639-1 codes | `language <query>` |
| location.php | Get latitude and longitude of a given address | `location <address>` |
| packagist.php | Search packagist | `packagist <query>`|
| pt.php | Search the periodic table of elements | `pt <element/symbol/number>` |
| safe.php | Check whether a website has suspicious content (Google Safebrowsing) | `safe <url>` |
| search.php | Search DuckDuckGo Instant Answers | `search <query>` |
| stock.php | Get stock information from Yahoo | `stock <symbol>` |
| wiki.php | Wikipedia searches | `wiki <query> [-l language]` |

### Media

| Script | Description | Fish-Usage |
|--------|-------------|------------|
| book.php | Get information about a book from Google | `book <query>` |
| cat.php | Get a random picture of a cat | `cat` |
| image.php | Search Wikimedia Commons | `image <query>` |
| itunes.php | Search the iTunes Store | `itunes <query> [-c country]` |
| lichess.php | Get information on a lichess-game | `lichess <game-id>` |
| mcuuid.php | Get Minecraft UUIDs | `mcuuid <nick>` |
| mlp.php | Get the title and air-date of a My Little Pony - Friendship is Magic episode | `mlp <season> <episode>` |
| nasa.php | Get NASA's Astronomy Picture Of The Day | `nasa` |
| omdb.php | Search the Open Movie Database | `omdb <query>` |
| spotify.php | Get song previews | `spotify <query>` |
| steam.php | Search the steam store | `steam <query>` |
| topic.php | Get a random hot topic | `topic` |
| twitch.php | Search twitch livestreams | `twitch <query> ` |


### Private

The scripts in this category need to be changed with private data (api keys, etc.) before they can be used.

| Script | Description | Dependencies | Fish-Usage |
|--------|-------------|--------------|------------|
| google.php | Search a Google CSE | Google CSE API Key and CSE ID | `google <query>` |
| news.php | Get the latest news headlines | newsapi.org API key | `news [source] [article]` |
| yt.php | Search YouTube | YouTube Data API v3 Key | `yt <query>` |

### Utilities

| Script | Description | Fish-Usage |
|--------|-------------|------------|
| base64.php | Decode and encode base64 | `base64 <method> <value>` |
| calc.php | Do calculations | `calc <expression>` |
| coin.php | Flip a coin | `coin` |
| diff.php | Calculate time differences | `diff <then> [now]` |
| distance.php | Driving distance from one place to another | `distance A B` |
| down.php | Check whether a website is down or not | `down <url>` |
| identity.php | Get a random identity | `identity` |
| ip.php | DNS lookup | `ip <domain>` |
| lt.php | Use the languagetool.org service | `lt <language/auto> <text>` | 
| paste.php | Paste to dpaste.com | `paste <text>` |
| random.php | Generates random numbers | `random <min> <max> [rolls] [add to sum]` |
| realtime.php | Convert a unix-timestamp to a real date | `realtime <unix timestamp>` |
| shorten.php | Shorten a URL using tinyurl.com | `shorten <url>` |
| sort.php | Sort the input | `sort <input>` |
| string.php | Generate a random string | `string [length] [chars]` |
| time.php | Time in a timezone | `time [timezone]` |

### Weather

| Script | Description | Fish-Usage |
|--------|-------------|------------|
| dwd.php | Weather warnings from Deutscher Wetterdienst | `dwd [place]` |
| weather.php | Get weather or forecast for location | `weather <location> [-f days]` |

If you wish to add your scripts to the list, feel free to do so via pull request. I welcome every contribution.

## License

The code in this repository is released to the public domain.

```
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```