# using python 3

import json
import requests

# url
bithumbAPI = 'https://api.bithumb.com/public/ticker/all'
coinoneAPI = 'https://api.coinone.co.kr/ticker/?currency=all'
korbitAPI = [
'https://api.korbit.co.kr/v1/ticker?currency_pair=btc_krw',
'https://api.korbit.co.kr/v1/ticker?currency_pair=bch_krw',
'https://api.korbit.co.kr/v1/ticker?currency_pair=eth_krw',
'https://api.korbit.co.kr/v1/ticker?currency_pair=etc_krw',
'https://api.korbit.co.kr/v1/ticker?currency_pair=xrp_krw'
]

class bithumb:
	def __init__(self, url = bithumbAPI):
		try:
			res = requests.get(url)
			resDict = json.loads(res.text)
				
			self.BTC = int(resDict['data']['BTC']['closing_price'])		# BTC
			self.BCH = int(resDict['data']['BCH']['closing_price'])		# BCH
			self.ETH = int(resDict['data']['ETH']['closing_price'])		# ETH
			self.ETC = int(resDict['data']['ETC']['closing_price'])		# ETC
			
			self.XRP = int(resDict['data']['XRP']['closing_price'])		# XRP
			
		except:
			self.BTC = self.BCH = self.ETH = self.ETC = self.XRP = 0

class coinone:
	def __init__(self, url = coinoneAPI):
		try:
			res = requests.get(url)
			resDict = json.loads(res.text)
			
			self.BTC = int(resDict['btc']['last'])		# BTC
			self.BCH = int(resDict['bch']['last'])		# BCH
			self.ETH = int(resDict['eth']['last'])		# ETH
			self.ETC = int(resDict['etc']['last'])		# ETC
			self.XRP = int(resDict['xrp']['last'])		# XRP
		except:
			self.BTC = self.BCH = self.ETH = self.ETC = self.XRP = 0
			
class korbit:	
	# function call
	def __init__(self,
		urlBTC = korbitAPI[0],
		utlBCH = korbitAPI[1],
		urlETH = korbitAPI[2],
		urlETC = korbitAPI[3],
		urlXRP = korbitAPI[4]
	):
		def GetPrice(url):
			res = requests.get(url)
			resDict = json.loads(res.text)
			return int(resDict['last'])
		
		try:
			self.BTC = GetPrice(urlBTC)					# BTC
			self.BCH = GetPrice(urlETC)					# BCH
			self.ETH = GetPrice(urlETH)					# ETH
			self.ETC = GetPrice(urlETC)					# ETC			
			self.XRP = GetPrice(urlXRP)					# XRP
		except:
			self.BTC = self.BCH = self.ETH = self.ETC = self.XRP = 0