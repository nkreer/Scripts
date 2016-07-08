# Scripts

![Number of scripts](https://img.shields.io/badge/Scripts-34-brightgreen.svg)
![License](https://img.shields.io/badge/License-Public%20Domain-blue.svg)

This repository contains all scripts I personally use as commands with my [Scripts-Plugin](https://github.com/nkreer/Fish-Scripts) for the Fish IRC-Bot and another private project, but they can be used like any other PHP script on the command line. Just fill `$argv[1]` and `$argv[2]` with something random.

## List of Scripts

| Script | Description | Usage |
|--------------|-----------------------------------------------|-------------------------------------------|
| wiki.php | Wikipedia searches | `wiki <query> [-l language]` |
| gif.php | Gif searches via Giphy | `gif <query>` |
| spotify.php | Get song previews | `spotify <query>` |
| fact.php | Random fact from numbersapi.com | `fact [number]` |
| catfact.php | Random cat fact from catfacts-api.appspot.com | `catfact` |
| joke.php | Chuck Norris jokes via icndb.com | `joke` |
| distance.php | Distance from one place to another | `distance A B` |
| time.php | Time in a timezone | `time [timezone]` |
| realtime.php | Convert a unix-timestamp to a real date | `realtime <unix timestamp>` |
| random.php | Generates random numbers | `random <min> <max> [rolls] [add to sum]` |
| define.php | Get urban dictionary definitions | `define <query>` |
| weather.php | Get weather or forecast for location | `weather <location> [-f days]` |
| search.php | Search DuckDuckGo Instant Answers | `search <query>` |
| github.php | Search GitHub repositories | `github <query>` |
| calc.php | Do calculations | `calc <expression>` |
| coffee.php | Makes the bot give coffee | `coffee [username]` |
| slap.php | Slap a user with something random | `slap [username]` |
| ping.php | Simply replies with "Pong". | `ping` |
| swag.php | Makes a text go rainbow | `swag <text>` |
| omdb.php | Search the Open Movie Database | `omdb <query>` |
| dwd.php | Weather warnings from Deutscher Wetterdienst | `dwd [place]` |
| topic.php | Get a random hot topic | `topic` |
| identity.php | Get a random identity | `identity` |
| ip.php | Get the IP of a domain | `ip <domain>` |
| book.php | Get information about a book from Google | `book <query>` |
| stock.php | Get stock information from Yahoo | `stock <symbol>` |
| image.php | Get a viral image from imgur | `image` |
| cve.php | Get info on a CVE | `cve <CVE-ID>` |
| qod.php | Get the Quote Of The Day from They Said So | `qod [category]` |
| shorten.php | Shorten a URL using tinyurl.com | `shorten <url>` |
| paste.php | Paste to dpaste.com | `paste <text>` |
| location.php | Get latitude and longitude of a given address | `location <address>` |
| chefkoch.php | Search Chefkoch.de | `chefkoch <query>`|
| safe.php | Check is a website is suspicous | `safe <url>` |

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