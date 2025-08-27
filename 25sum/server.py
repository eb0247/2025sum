from http.server import HTTPServer, SimpleHTTPRequestHandler
import sys

if len(sys.argv) < 2:
    print("Usage: python server.py <port>")
    sys.exit(1)

local_port = int(sys.argv[1])
local_host = "127.0.0.1"

server = HTTPServer((local_host, local_port), SimpleHTTPRequestHandler)

print(f"Server running on {local_host}:{local_port}")
server.serve_forever()
