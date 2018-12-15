from flask import Flask, request,  jsonify
from json import dumps, loads
from rediscluster import StrictRedisCluster

app = Flask(__name__)

redis_nodes = [{"host": "192.168.33.21", "port": "6379"}, {"host": "192.168.33.22", "port": "6380"}, {"host": "192.168.33.23", "port": "6381"}]
rc = StrictRedisCluster(startup_nodes=redis_nodes, decode_responses=True)

@app.route('/api/page/all', methods=['GET'])
def getPages():
	pattern = 'page:*'
	keys = rc.keys(pattern)
	res = []
	for key in keys:
		ret_data = rc.hgetall(key)
		res.append(ret_data)
	
	return dumps(res)

@app.route('/api/page/<page_id>', methods=['POST'])
def storePage(page_id):
    data = request.get_json()[0]
    data = loads(data)
    pattern = 'page:'+page_id+':'
    ins = rc.hmset(pattern, data)
    return dumps(data)

if __name__ == '__main__':
    app.run(debug=True)