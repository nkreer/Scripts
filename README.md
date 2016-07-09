# Scripts

![Number of scripts](https://img.shields.io/badge/Scripts-36-brightgreen.svg)
![License](https://img.shields.io/badge/License-Public%20Domain-blue.svg)

This repository contains all scripts I personally use as commands with my [Scripts-Plugin](https://github.com/nkreer/Fish-Scripts) for the Fish IRC-Bot and another private project, but they can be used like any other PHP script on the command line. Just fill `$argv[1]` and `$argv[2]` with something random.

## List of Scripts

### Fun

| Script | Description | Fish-Usage |
|--------|-------------|------------|
| coffee.php | Makes the bot give coffee | `coffee [username]` |
| gif.php | Gif searches via Giphy | `gif <query>` |
| image.php | Get a viral image from imgur | `image` |
| joke.php | Chuck Norris jokes via icndb.com | `joke` |
| ping.php | Simply replies with "Pong". | `ping` |
| qod.php | Get the Quote Of The Day from They Said So | `qod [category]` |
| slap.php | Slap a user with something random | `slap [username]` |
| swag.php | Makes a text go rainbow | `swag <text>` |

### Information

| Script | Description | Fish-Usage |
|--------|-------------|------------|
| catfact.php | Random cat fact from catfacts-api.appspot.com | `catfact` |
| chefkoch.php | Search Chefkoch.de | `chefkoch <query>`|
| cve.php | Get info on a CVE | `cve <CVE-ID>` |
| define.php | Get urban dictionary definitions | `define <query>` |
| fact.php | Random fact from numbersapi.com | `fact [number]` |
| github.php | Search GitHub repositories | `github <query>` |
| location.php | Get latitude and longitude of a given address | `location <address>` |
| packagist.php | Search packagist | `packagist <query>`|
| safe.php | Check is a website is suspicous | `safe <url>` |
| search.php | Search DuckDuckGo Instant Answers | `search <query>` |
| stock.php | Get stock information from Yahoo | `stock <symbol>` |
| wiki.php | Wikipedia searches | `wiki <query> [-l language]` |

### Media

| Script | Description | Fish-Usage |
|--------|-------------|------------|
| book.php | Get information about a book from Google | `book <query>` |
| itunes.php | Search the iTunes Store | `itunes <query> [-c country]` |
| omdb.php | Search the Open Movie Database | `omdb <query>` |
| spotify.php | Get song previews | `spotify <query>` |
| topic.php | Get a random hot topic | `topic` |

### Utilities

| Script | Description | Fish-Usage |
|--------|-------------|------------|
| calc.php | Do calculations | `calc <expression>` |
| distance.php | Driving distance from one place to another | `distance A B` |
| identity.php | Get a random identity | `identity` |
| ip.php | DNS lookup | `ip <domain>` |
| paste.php | Paste to dpaste.com | `paste <text>` |
| random.php | Generates random numbers | `random <min> <max> [rolls] [add to sum]` |
| realtime.php | Convert a unix-timestamp to a real date | `realtime <unix timestamp>` |
| shorten.php | Shorten a URL using tinyurl.com | `shorten <url>` |
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