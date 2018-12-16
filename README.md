# Eas Basis Data Terdistribusi

#### Cahya Putra Hikmawan - 05111540000119

-----------------------------------------

### Content
##### [1. Arsitektur Sistem](#1-arsitektur-sistem)
##### [2. MySQL Cluster](#2-mysql-cluster)
##### [3. MongoDB Atlas](#3-mongodb-atlas)
##### [4. Redis Cluster](#4-redis-cluster)
##### [5. Laravel App](#5-laravel-app)
##### [6. Penggunaan](#6-penggunaan)
##### [7. Testing Jmeter](#7-testing-jmeter)
##### [8. Referensi](#8-referensi)

-----------------------------------

### 1. Arsitektur Sistem
|No|Nama|Keterangan|Jumlah|
|---|---|---|---|
|1|OS Host|Ubuntu 18.04|1 Node|
|2|VM MySQL Cluster| Ubuntu 16.04|4 Node|
|3|VM Redis Cluster| Ubuntu 16.04|3 Node|
|4|MongoDB Atlas | - | 3 Node |
|5|Aplikasi| Laravel 5.6| - |

![asristektur](img/arsitektur.png)

-----------------------------------

### 2. MySQL Cluster

- Dokumentasi [https://github.com/cphikmawan](https://github.com/cphikmawan/database-distributed-courses/tree/master/mysql-cluster-proxysql)

- Konfigurasi Koneksi, file **_.env_**
```sh
DB_CONNECTION=mysql
DB_HOST=192.168.33.10
DB_PORT=6033
DB_DATABASE=dbeasapp
DB_USERNAME=easapp
DB_PASSWORD=easapp
```

- MVC Aplikasi menggunakan CRUD biasa

-----------------------------------

### 3. MongoDB Atlas

- MongoDB Atlas [https://cloud.mongodb.com/](https://cloud.mongodb.com/)

- Install MongoDB Driver untuk Laravel
    ```sh
    composer require jenssegers/mongodb
    ```

- Konfigurasi Koneksi, file **_.env_**
    ```sh
    MONGO_DB_HOST=127.0.0.1
    MONGO_DB_PORT=27017
    MONGO_DB_DATABASE=pageviews
    MONGO_DB_USERNAME=
    MONGO_DB_PASSWORD=
    ```

- Konfigurasi Koneksi, file **_config/database.php_**
    ```php
    .
    .

    'connections' => [

        'mongodb' => [
            'driver' => 'mongodb',
            'dsn'=>'mongodb://cloudy:sembarang12@cloudcluster0-shard-00-00-tiugx.mongodb.net:27017,cloudcluster0-shard-00-01-tiugx.mongodb.net:27017,cloudcluster0-shard-00-02-tiugx.mongodb.net:27017/test?ssl=true&replicaSet=CloudCluster0-shard-0&authSource=admin&retryWrites=true',
            'database' => 'pageviews',
        ],
    .
    .
    .
    ],
    ```

### 4. Redis Cluster

- Setelah Melakukan **_"vagrant up"_**

- Node 1
    1. Membuat Konfigurasi master.conf
        ```sh
        bind 0.0.0.0
        port 6379
        cluster-enabled yes
        cluster-config-file redis-node-1.conf
        cluster-node-timeout 5000
        appendonly yes
        appendfilename redis-1.aof
        dbfilename redis-1.rdb
        ```

    2. Membuat Konfigurasi slave.conf
        ```sh
        bind 0.0.0.0
        port 6381
        cluster-enabled yes
        cluster-config-file redis-node-4.conf
        cluster-node-timeout 5000
        appendonly yes
        appendfilename redis-4.aof
        dbfilename redis-4.rdb
        ```

    3. Melakukan Koneksi dan disimpan di background
        ```sh
        # Connection
        redis-server /vagrant/redis-cluster/configure/node1/master.conf > /dev/null 2>&1 &
        redis-server /vagrant/redis-cluster/configure/node1/slave.conf > /dev/null 2>&1 &
        ```

    4. Membuat Cluster
        ```sh
        redis-cli --cluster create 192.168.33.21:6379 192.168.33.22:6380 192.168.33.23:6381
        ```
    5. Koneksi Slave ke Master
        ```sh
        redis-cli --cluster add-node 192.168.33.21:6381 192.168.33.23:6381 --cluster-slave
        ```

- Node 2
    1. Membuat Konfigurasi master.conf
        ```sh
        bind 0.0.0.0
        port 6380
        cluster-enabled yes
        cluster-config-file redis-node-2.conf
        cluster-node-timeout 5000
        appendonly yes
        appendfilename redis-2.aof
        dbfilename redis-2.rdb
        ```

    2. Membuat Konfigurasi slave.conf
        ```sh
        bind 0.0.0.0
        port 6379
        cluster-enabled yes
        cluster-config-file redis-node-5.conf
        cluster-node-timeout 5000
        appendonly yes
        appendfilename redis-5.aof
        dbfilename redis-5.rdb
        ```
    3. Melakukan Koneksi dan disimpan di background
        ```sh
        redis-server /vagrant/redis-cluster/configure/node2/master.conf > /dev/null 2>&1 &
        redis-server /vagrant/redis-cluster/configure/node2/slave.conf > /dev/null 2>&1 &
        ```

    4. Membuat Cluster
        ```sh
        redis-cli --cluster create 192.168.33.21:6379 192.168.33.22:6380 192.168.33.23:6381
        ```
    5. Koneksi Slave ke Master
        ```sh
        redis-cli --cluster add-node 192.168.33.22:6379 192.168.33.21:6379 --cluster-slave
        ```

- Node 3
    1. Membuat Konfigurasi master.conf
        ```sh
        bind 0.0.0.0
        port 6381
        cluster-enabled yes
        cluster-config-file redis-node-3.conf
        cluster-node-timeout 5000
        appendonly yes
        appendfilename redis-3.aof
        dbfilename redis-3.rdb
        ```

    2. Membuat Konfigurasi slave.conf
        ```sh
        bind 0.0.0.0
        port 6380
        cluster-enabled yes
        cluster-config-file redis-node-6.conf
        cluster-node-timeout 5000
        appendonly yes
        appendfilename redis-6.aof
        dbfilename redis-6.rdb
        ```
    3. Melakukan Koneksi dan disimpan di background
        ```sh
        redis-server /vagrant/redis-cluster/configure/node3/master.conf > /dev/null 2>&1 &
        redis-server /vagrant/redis-cluster/configure/node3/slave.conf > /dev/null 2>&1 &
        ```

    4. Membuat Cluster
        ```sh
        redis-cli --cluster create 192.168.33.21:6379 192.168.33.22:6380 192.168.33.23:6381
        ```
    5. Koneksi Slave ke Master
        ```sh
        redis-cli --cluster add-node 192.168.33.23:6380 192.168.33.22:6380 --cluster-slave
        ```

- Cluster siap digunakan
    > Tidak membuat replica

### 5. Laravel App

1. Koneksi MySQL Cluster sudah dijelaskan di step sebelumnya

2.  Koneksi MongoDB Atlas sudah dijelaskan di step sebelumnya
    - Untuk file **Model** yang akan digunakan harus ditambahkan driver yang sudah diinstall sebelumnya
    - File Model **_Pages.php_**
        ```php
        <?php

        namespace App;

        use Illuminate\Database\Eloquent\Model;
        use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
        class Pages extends Eloquent
        {
            protected $connection = 'mongodb';
            protected $collection = 'countviews';

            protected $fillable = [
                'key', 'name', 'count'
            ];
        }
        ```
    - Controller dan Views tidak diperlukan config tambahan

3.  Koneksi ke Redis Cluster menggunakan API yang dibuat dengan Python Flask
    ```python
    from flask import Flask, request,  jsonify
    from json import dumps, loads
    from rediscluster import StrictRedisCluster

    app = Flask(__name__)

    redis_nodes = [{"host": "192.168.33.21", "port": "6379"}, {"host": "192.168.33.22", "port": "6380"}, {"host": "192.168.33.23", "port": "6381"}]
    rc = StrictRedisCluster(startup_nodes=redis_nodes, decode_responses=True)

    # add page for count
    @app.route('/api/page/zadd/<page_id>', methods=['POST'])
    def addPage(page_id):
        pattern = 'page:'+page_id+':'
        insert = rc.zadd('Views', 0, pattern)

        return dumps(insert)

    # increment page count
    @app.route('/api/page/incr/<page_id>', methods=['POST'])
    def incrPage(page_id):
        pattern = 'page:'+page_id+':'
        insert = rc.zincrby('Views', pattern, 1.0)

        return dumps(insert)

    # get increment value
    @app.route('/api/page/get_incr/<page_id>', methods=['GET'])
    def getIncrPages(page_id):
        pattern = 'page:'+page_id+':'
        res = []
        get_data = rc.zscore('Views', pattern)
        res.append(get_data)
        
        return dumps(res)

    # get rank
    @app.route('/api/page/get_rank/', methods=['GET'])
    def getRange():
        res = []
        get_data = rc.zrange('Views', 0, -1, 'DESC', 'WITHSCORES' )
        print (get_data)
        res.append(get_data)
        
        return dumps(res)

    if __name__ == '__main__':
        app.run(debug=True)
    ```

4. Install GuzzleHttp untuk koneksi ke API
    ```sh
    composer require guzzlehttp/guzzle:~6.0
    ```

5. PagesController.php
    ```php
    <?php

    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Pages;
    use GuzzleHttp\Client;

    class PageController extends Controller
    {
        public function index()
        {
            $pages = Pages::all();
            return view('pageviews.index',compact('pages', 'res'));
        }

        public function create()
        {
            return view('pageviews.create');
        }

        public function store(Request $request)
        {
            // save to mongo
            $page = new Pages();
            $page->key = $request->get('key');
            $page->name = $request->get('name');
            $page->count = 0;
            $page->save();

            $client = new Client();
            $increment = $client->post('http://localhost:5000/api/page/zadd/'.$page->id);
            
            return redirect('/pagelist')->with('success', 'New Page Added');
        }

        public function ranking()
        {
            // $pages = Pages::orderBy('count', 'desc')->get();
            $client = new Client();
            $res = $client->get('http://localhost:5000/api/page/get_rank/')->getBody();
            $res = json_decode($res);
            // dd($res);
        
            return view('pageviews.ranking',compact('res'));
        }

        public function pages($id)
        {
            // save to mongo
            $page = Pages::find($id);
            $page->increment('count');

            // redis
            $client = new Client();
            $increment = $client->post('http://localhost:5000/api/page/incr/'.$page->id);
            $res = $client->get('http://localhost:5000/api/page/get_incr/'.$page->id)->getBody();
            $res = json_decode($res);

            return view('pageviews.page',compact('page', 'res'));        
        }
    }
    ```

### 6. Penggunaan
1. Listen Server Flask
    ```sh
    python redisapi.py
    ```

2. Listen Development Server Laravel
    ```sh
    php artisan serve --port 9000
    ```

3. Akses http://localhost:9000

4. Tambah Data Buku

![Gambar SS Buku]()
![Gambar SS MySQL Cluster]()

5. Tambah Page
![Gambar Tambah Page]()

6. Increment Page
![Gambar Incremen Page 1]()
![Gambar Incremen Page 2]()
![Gambar Incremen Page 3]()


7. Ranking
![Gambar Ranking]()


### 7. Testing Jmeter 

### 8. Referensi 
- [https://www.linode.com/docs/applications/big-data/how-to-install-and-configure-a-redis-cluster-on-ubuntu-1604/](https://www.linode.com/docs/applications/big-data/how-to-install-and-configure-a-redis-cluster-on-ubuntu-1604/)

- [https://redis.io/](https://redis.io/)

- [https://redis-py.readthedocs.io/en/latest/_modules/redis/client.html](https://redis-py.readthedocs.io/en/latest/_modules/redis/client.html)

- [https://pypi.org/project/redis-py-cluster/](https://pypi.org/project/redis-py-cluster/)

- [https://github.com/jenssegers/laravel-mongodb](https://github.com/jenssegers/laravel-mongodb)

- [http://docs.guzzlephp.org/en/stable/overview.html](http://docs.guzzlephp.org/en/stable/overview.html)