# using python 3

import price
import time

import json
import http.client
import requests

phpServerUrl = 'http://bitcoin.tronze.me/PHP/send_sms.php'
phpServerUpdateUrl = 'http://bitcoin.tronze.me/PHP/update_coin.php'

# php server interface
# market, coin, price
# market - bithumb : 0,
#		   coinone : 1,
#		   korbit : 2,
		 
# coin - btc : 0,
#		 bch : 1,
#		 eth : 2,
#		 etc : 3,
#		 xrp : 4

def ToJasonForPhp(market, coin, price):
	# use example : 
	# ToJasonForPhp('coinone', 'eth', 1000)
	retVal = {}
	
	if market == 'bithumb' :
		retVal['market'] = '0'
	elif market == 'coinone' :
		retVal['market'] = '1'
	elif market == 'korbit' :
		retVal['market'] = '2'
	
	if coin == 'btc' :
		retVal['coin'] = '0'
	elif coin == 'bch' :
		retVal['coin'] = '1'
	elif coin == 'eth' :
		retVal['coin'] = '2'
	elif coin == 'etc' :
		retVal['coin'] = '3'
	elif coin == 'xrp' :
		retVal['coin'] = '4'

	retVal['price'] = str(price)
	
	return retVal


'''
json
{"market" : "0", "coin" : "1", "price" : "20001234"}
'''

def RequestSend(url, marketName, market):
	requests.post(url, json.dumps(ToJasonForPhp(marketName,'btc',market.BTC)))
	requests.post(url, json.dumps(ToJasonForPhp(marketName,'bch',market.BCH)))
	requests.post(url, json.dumps(ToJasonForPhp(marketName,'eth',market.ETH)))
	requests.post(url, json.dumps(ToJasonForPhp(marketName,'etc',market.ETC)))
	r = requests.post(url, json.dumps(ToJasonForPhp(marketName,'xrp',market.XRP)))
	print("status code, text : " + str(r.status_code) + ", " + r.text)
	
while True:

	# bithumb

	bithumb = price.bithumb()
	
	RequestSend(phpServerUrl, 'bithumb', bithumb)
	RequestSend(phpServerUpdateUrl, 'bithumb', bithumb)
	
	'''
	print("-------------------------- " + " --------------------------")
	print(":: bithumb ::")
	print("BTC : " + str(bithumb.BTC))
	print("BCH : " + str(bithumb.BCH))
	print("ETH : " + str(bithumb.ETH))
	print("ETC : " + str(bithumb.ETC))
	print("XRP : " + str(bithumb.XRP))
	'''
	
	# coinone 
	
	coinone = price.coinone()

	RequestSend(phpServerUrl, 'coinone', coinone)
	RequestSend(phpServerUpdateUrl, 'coinone', coinone)
	
	'''
	print("")
	print(":: coinone ::")
	print("ETC : " + str(coinone.BTC))
	print("BTC : " + str(coinone.BCH))
	print("ETH : " + str(coinone.ETH))
	print("ETH : " + str(coinone.ETC))
	print("XRP : " + str(coinone.XRP))
	'''
	
	# korbit
	
	korbit = price.korbit()
	
	RequestSend(phpServerUrl, 'korbit', korbit)
	RequestSend(phpServerUpdateUrl, 'korbit', korbit)
		
	'''
	print("")
	print("::korbit ::")
	print("BTC : " + str(korbit.BTC))
	print("BTC : " + str(korbit.BCH))
	print("ETH : " + str(korbit.ETH))
	print("ETC : " + str(korbit.ETC))
	print("XRP : " + str(korbit.XRP))
	'''
	
	time.sleep(5)
	