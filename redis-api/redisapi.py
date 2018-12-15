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